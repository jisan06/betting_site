<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\CustomerBett;

class CustomerBettController extends Controller
{  
    public function index(){
        $title = "My Bets";
        $customer_bets_list = CustomerBett::
                                            where('client_id',\Auth::guard('customer')->user()->id)
                                            ->orderBy('id','desc')
                                            ->get();
        return view('frontend.customer.betts.index')->with(compact('title','customer_bets_list'));
    }

    public function view($id){
        $title = "Bet Details";
        $customer_bets_details = CustomerBett::find($id);
        return view('frontend.customer.betts.view')->with(compact('title','customer_bets_details'));
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
        $customer_bett = new CustomerBett();
		$customer_bett->create([
            'client_id' => \Auth::guard('customer')->user()->id,
            'betting_id' => request()->betting_id,
            'betting_stack' => request()->betting_stack,
            'wining_amount' => request()->wining_amount,
        ]);

        return 1;
    }
}
