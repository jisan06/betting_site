<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Match;
use App\Game;
use App\CustomerDeposite;
use App\Client;

class DepositeRequestController extends Controller
{
    public function index()
    {
        $title = "Manage All Deposite Request";

        $customer_deposite_list = CustomerDeposite::orderBy('id','desc')->get();

        return view('admin.deposite_request.index')->with(compact('title','customer_deposite_list'));
    }

    public function edit($id)
    {
        $title = "Update Deposite Request";
        $buttonName = "Update";

        $customer_deposite_details = CustomerDeposite::find($id);
        $customer_details = Client::find($customer_deposite_details->client_id);

        return view('admin.deposite_request.edit')->with(compact('title','buttonName','customer_deposite_details','customer_details'));
    }

    public function update($id)
    {
        $deposite = CustomerDeposite::find($id);
        $client_info = Client::find($deposite->client_id);

        $deposite->update([
            'deposite_amount' => request()->deposite_amount,
            'status' => request()->status,
        ]);

         if($deposite->is_deposited == 0 && $deposite->status == 1){
            $deposite->update([
                'is_deposited' => 1,
            ]);

            $client_info->update([
                'balance' => $client_info->balance + $deposite->deposite_amount,
             ]);
            return redirect(route('depositeRequest.index'))->with('msg','Deposite Request Updated');
        }

        return redirect(route('depositeRequest.index'))->with('error', 'Already deposited before');

    }

    public function status(Request $request)
    {
        $deposite = CustomerDeposite::find($request->deposite_id);
        $client_info = Client::find($deposite->client_id);

        if ($deposite->status == 1)
        {
            $deposite->update( [               
                'status' => 0                
            ]);
        }
        else
        {
            $deposite->update( [               
                'status' => 1                
            ]);
        }

        if($deposite->is_deposited == 0 && $deposite->status == 1){
            $deposite->update([
                'is_deposited' => 1,
            ]);
            
            $client_info->update([
                'balance' => $client_info->balance + $deposite->deposite_amount,
             ]);
        }
    }

    public function delete(Request $request)
    {
        CustomerDeposite::where('id',$request->deposite_id)->delete();
    }
}
