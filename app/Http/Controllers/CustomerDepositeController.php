<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\CustomerDeposite;
use App\PaymentMethod;
use App\PaymentNumber;

class CustomerDepositeController extends Controller
{  
    public function index(){
        $title = "My Deposite";
        $customer_deposite_list = CustomerDeposite::
                                            where('client_id',\Auth::guard('customer')->user()->id)
                                            ->orderBy('id','desc')
                                            ->get();
        return view('frontend.customer.deposite.index')->with(compact('title','customer_deposite_list'));
    }

    public function depositeRequest(){
        $title = "Request A Deposite";

        $payment_methods = PaymentMethod::where('status',1)->orderBy('order_by','asc')->get();

        if(count(request()->all()) > 0){
            $this->validate(request(), [
                'payment_method_id' => ['required'],
                'deposite_to' => ['required'],
                'deposite_from' => ['required'],
                'transaction_no' => 'required|unique:tbl_client_deposites',
                'deposite_amount' => 'required|not_in:0',
            ],
                [
                    'deposite_amount.not_in' => 'your deposite amount must be greater than 0'
                ]
            );

            $deposite = new CustomerDeposite();
            $deposite->create([
                'client_id' => \Auth::guard('customer')->user()->id,
                'payment_method_id' => request()->payment_method_id,
                'deposite_to' => request()->deposite_to,
                'deposite_from' => request()->deposite_from,
                'transaction_no' => request()->transaction_no,
                'deposite_amount' => request()->deposite_amount,
            ]);

            return redirect(route('user.deposite'))->with('success_message', 'Your deposite request succesfull and will be added your balane after author review.');
        }else{
            return view('frontend.customer.deposite.request-deposite')->with(compact('title','payment_methods'));
        }
        
    }

    public function view($id){
        $title = "Deposite Details";
        $customer_deposite_details = CustomerDeposite::find($id);
        return view('frontend.customer.deposite.view')->with(compact('title','customer_deposite_details'));
    }

    public function getPaymentNo(){
        $payment_numbers = PaymentNumber::where('status',1)
                                    ->orderBy('order_by','asc')
                                    ->where('payment_method_id',request()->payment_method_id)
                                    ->get();
        $payment_number_html = (string)view('frontend.components.payment_no', 
                            [
                                'payment_numbers' => $payment_numbers,
                            ]
                        );
        return response()->json([
            'payment_number_html'=> $payment_number_html

        ]);
    }
}
