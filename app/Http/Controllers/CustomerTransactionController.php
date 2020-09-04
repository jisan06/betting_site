<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\CustomerTransfer;
use App\Client;
use Auth;

class CustomerTransactionController extends Controller
{
    public function index(){
        $title = "My Transaction";
        $customer_transfer_list = CustomerTransfer::
                                    where('client_id',\Auth::guard('customer')->user()->id)
                                    ->orderBy('id','desc')
                                    ->get();
        return view('frontend.customer.transaction.index')->with(compact('title','customer_transfer_list'));
    }

    public function view($id){
        $title = "Transfer Details";
        $customer_transfer_details = CustomerTransfer::find($id);
        return view('frontend.customer.transfer.view')->with(compact('title','customer_transfer_details'));
    }
}
