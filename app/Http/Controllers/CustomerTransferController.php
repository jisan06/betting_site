<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\CustomerTransfer;
use App\Client;
use Auth;

class CustomerTransferController extends Controller
{
    public function index(){
        $title = "My Transfer";
        $customer_transfer_list = CustomerTransfer::
                                    where('client_id',\Auth::guard('customer')->user()->id)
                                    ->orderBy('id','desc')
                                    ->get();
        return view('frontend.customer.transfer.index')->with(compact('title','customer_transfer_list'));
    }

    public function transferRequest(){

        $title = "Request to Transfer";
        if(count(request()->all()) > 0){
            $this->validate(request(), [
                'to_username' => ['required'],
                'to_phone_no' => ['required'],
                'transfer_amount' => 'required|not_in:0',
                'password' => 'required',
            ],
                [
                    'transfer_amount.not_in' => 'Your transfer amount must be greater than 0'
                ]
            );

            $transfer = new CustomerTransfer();
            $userPassword = Auth::guard('customer')->user()->password;
            $client = Client::where('id',Auth::guard('customer')->user()->id)->first();
            $name = Auth::guard('customer')->user()->name;
            $phone = Auth::guard('customer')->user()->phone;
            $receiver = Client::where('username',request()->to_username)->first();

            if(!Hash::check(request()->password, $userPassword)){
            	return redirect()->back()->withErrors(['error' => 'Your password is wrong']);
            }elseif (Auth::guard('customer')->user()->balance - request()->transfer_amount < 0 ) {
                return redirect()->back()->withErrors(['error' => 'Your do not have sufficient balance']);
            }elseif(!@$receiver){
            	return redirect()->back()->withErrors(['error' => 'Username is not found']);
            }else{
            	
	        	$client->update([
	                'balance' => $client->balance - request()->transfer_amount,
	            ]);

	            $receiver->update([
	                'balance' => $receiver->balance + request()->transfer_amount,
	            ]);

                $transfer->create([
                    'client_id' => \Auth::guard('customer')->user()->id,
                    'name' => $name,
                    'phone_no' => $phone,
                    'to_username' => $receiver->username,
                    'to_phone_no' => $receiver->phone,
                    'transfer_amount' => request()->transfer_amount,
                    'current_balance' => $client->balance,
                ]);

	        	return redirect(route('user.transfer'))->with('success_message', 'Your transfer request succesfull');
            }
            
        }else{
            return view('frontend.customer.transfer.request-transfer')->with(compact('title'));
        }
    }

    public function view($id){
        $title = "Transfer Details";
        $customer_transfer_details = CustomerTransfer::find($id);
        return view('frontend.customer.transfer.view')->with(compact('title','customer_transfer_details'));
    }
}
