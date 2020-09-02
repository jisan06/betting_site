<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\CustomerWithdraw;

class CustomerWithdrawController extends Controller
{
    public function index(){
        $title = "My Withdraw";
        $customer_withdraw_list = CustomerWithdraw::
                                            where('client_id',\Auth::guard('customer')->user()->id)
                                            ->orderBy('id','desc')
                                            ->get();
        return view('frontend.customer.withdraw.index')->with(compact('title','customer_withdraw_list'));
    }
    public function withdrawRequest(){

        $title = "Request to Withdraw";
        if(count(request()->all()) > 0){
            $this->validate(request(), [
                'payment_method_id' => ['required'],
                'payment_type' => ['required'],
                'withdraw_amount' => 'required|not_in:0',
                'withdraw_number' => 'required',
                'password' => 'required',
            ],
                [
                    'withdraw_amount.not_in' => 'Your withdraw amount must be greater than 0'
                ]
            );

            $withdraw = new CustomerWithdraw();
            $userPassword = Auth::guard('customer')->user()->password;

            if(!Hash::check(request()->password, $userPassword)){
            	return redirect()->back()->withErrors(['error' => 'Your password is wrong',]);
            }else{
            	$withdraw->create([
	                'client_id' => \Auth::guard('customer')->user()->id,
	                'payment_method_id' => request()->payment_method_id,
	                'payment_type' => request()->payment_type,
	                'withdraw_amount' => request()->withdraw_amount,
	                'withdraw_number' => request()->withdraw_number,
	        	]);
	        	return redirect(route('user.withdraw'))->with('success_message', 'Your withdraw request succesfull and will be sent to your account after admin review.');
            }
            
        }else{
            return view('frontend.customer.withdraw.request-withdraw')->with(compact('title'));
        }
    }

    public function view($id){
        $title = "Withdraw Details";
        $customer_withdraw_details = CustomerWithdraw::find($id);
        return view('frontend.customer.withdraw.view')->with(compact('title','customer_withdraw_details'));
    }
    
}