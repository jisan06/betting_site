<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class TransactionController extends Controller
{
    public function index()
    {
        $title = "All Transaction";

        $customer_transaction_list = \DB::table('view_transaction')
                                    ->where('is_transaction','1')
                                    ->orderBy('transaction_for','asc')
                                    ->get();

        return view('admin.transactions.index')->with(compact('title','customer_transaction_list'));
    }

}
