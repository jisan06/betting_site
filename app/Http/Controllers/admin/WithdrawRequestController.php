<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\CustomerWithdraw;
use App\Client;

class WithdrawRequestController extends Controller
{
    public function index()
    {
        $title = "Manage All Withdraw Request";

        $customer_withdraw_list = CustomerWithdraw::orderBy('is_withdrawed','asc')->orderBy('id','desc')->get();

        return view('admin.withdraw_request.index')->with(compact('title','customer_withdraw_list'));
    }

    public function edit($id)
    {
        $title = "Update Withdraw Request";
        $buttonName = "Update";

        $customer_withdraw_details = CustomerWithdraw::find($id);
        $customer_details = Client::find($customer_withdraw_details->client_id);

        return view('admin.withdraw_request.edit')->with(compact('title','buttonName','customer_withdraw_details','customer_details'));
    }

    public function update($id)
    {
        $withdraw = CustomerWithdraw::find($id);
        $client_info = Client::find($withdraw->client_id);

        if (@$client_info->balance - $withdraw->withdraw_amount < 0 ) {
                return redirect()->back()->withErrors(['error' => 'Client does not have sufficient balance']);

	    }else{   
	    	$withdraw->update([
	            'withdraw_amount' => request()->withdraw_amount,
	            'status' => request()->status,
	        ]);

	        if($withdraw->is_withdrawed == 0 && $withdraw->status == 1){
	            
                $withdraw->update([
                    'is_withdrawed' => 1,
                    'current_balance' => $client_info->balance,
                ]);
	            return redirect(route('withdrawRequest.index'))->with('msg','Withdraw Request Updated');
	        }
    	}

        return redirect(route('withdrawRequest.index'))->with('error','You have already sent money before');

    }

    public function delete(Request $request)
    {
        CustomerWithdraw::where('id',$request->withdraw_id)->delete();
    }

    public function status(Request $request)
    {
        $withdraw = CustomerWithdraw::find($request->withdraw_id);
        $client_info = Client::find($withdraw->client_id);

        if ($withdraw->status == 1)
        {
            $withdraw->update( [               
                'status' => 0                
            ]);
        }
        else
        {
            $withdraw->update( [               
                'status' => 1                
            ]);
        }

        if($withdraw->is_withdraw == 0 && $withdraw->status == 1){
            $withdraw->update([
                'is_withdraw' => 1,
            ]);
            
            $client_info->update([
                'balance' => $client_info->balance - $withdraw->withdraw_amount,
             ]);
        }
    }
}
