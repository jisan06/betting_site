<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Agent;
use App\Subagent;
use App\Warehouse;
use App\Marchant;
use App\Client;
use App\BookingOrder;
use App\CustomerDeposite;
use App\CustomerWithdraw;
use App\CustomerBett;
use App\CustomerTransfer;

use Auth;
use Session;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $title = "Web Site CMS Dashboard";
        $userId = Auth::user()->id;
        $userRole = Auth::user()->role;

        $new_deposit_request = CustomerDeposite::where('is_deposited',0)->orWhere('is_deposited',NULL)->get();
        $new_withdraw_request = CustomerWithdraw::where('is_withdrawed',0)->orWhere('is_withdrawed',NULL)->get();
        $customer_bets_list = CustomerBett::orderBy('id','desc')->get();
        $total_transfer = CustomerTransfer::sum('transfer_amount');

        $title = "Dashboard";
        return view('admin.index.index')->with(compact('title','new_deposit_request','new_withdraw_request','customer_bets_list','total_transfer'));
    }
}
