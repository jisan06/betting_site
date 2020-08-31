<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\CustomerDeposite;

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
        if(count(request()->all()) > 0){
            $this->validate(request(), [
                'deposite_from' => ['required'],
                'deposite_to' => ['required'],
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
                'deposite_from' => request()->deposite_from,
                'deposite_to' => request()->deposite_to,
                'transaction_no' => request()->transaction_no,
                'deposite_amount' => request()->deposite_amount,
            ]);

            return redirect(route('user.deposite'))->with('success_message', 'Your deposite request succesfull and will be added your balane after author review.');
        }else{
            return view('frontend.customer.deposite.request-deposite')->with(compact('title'));
        }
        
    }

    public function saveBett(){
        $this->validate(request(), [
            'betting_id' => ['required'],
            'betting_stack' => ['required','not_in:0'],
            'wining_amount' => 'required',
        ],
            [
                'betting_stack.not_in' => 'Betting stack must be greater than 0'
            ]
        );
        $deposite = new CustomerBett();
		$deposite->create([
            'client_id' => \Auth::guard('customer')->user()->id,
            'betting_id' => request()->betting_id,
            'betting_stack' => request()->betting_stack,
            'wining_amount' => request()->wining_amount,
        ]);

        return 1;
    }

    public function view($id){
        $title = "Deposite Details";
        $customer_deposite_details = CustomerDeposite::find($id);
        return view('frontend.customer.deposite.view')->with(compact('title','customer_deposite_details'));
    }
}
