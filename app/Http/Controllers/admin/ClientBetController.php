<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CustomerBett;
use App\CustomerDeposite;
use App\Client;

class ClientBetController extends Controller
{
    public function index()
    {
        $title = "All Client Betting";

        $customer_bets_list = CustomerBett::orderBy('id','desc')->get();

        return view('admin.client_bets.index')->with(compact('title','customer_bets_list'));
    }

    public function view($id)
    {
        $title = "Details of Client Betting";

        $customer_bets_details = CustomerBett::find($id);
        $client = Client::find($customer_bets_details->client_id);
        return view('admin.client_bets.view')->with(compact('title','customer_bets_details','client'));
    }
}
