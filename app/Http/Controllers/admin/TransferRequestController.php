<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\CustomerTransfer;

class TransferRequestController extends Controller
{
    public function index()
    {
        $title = "All Transfer Request";

        $customer_transfer_list = CustomerTransfer::orderBy('id','desc')->get();

        return view('admin.transfer_request.index')->with(compact('title','customer_transfer_list'));
    }
    public function delete(Request $request)
    {
        CustomerTransfer::where('id',$request->transfer_id)->delete();
    }

}
