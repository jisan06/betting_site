<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\CustomerBett;
use App\Client;

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


        $client_info = Client::find(\Auth::guard('customer')->user()->id);
        if($client_info->balance < request()->betting_stack){
            $this->validate(request(), [
                'current_balance' => ['required'],
            ],
                [
                    'current_balance.required' => "You don't have suffucient balance",
                ]
            );
        }

        $customer_bett = new CustomerBett();
		$customer_bett->create([
            'client_id' => \Auth::guard('customer')->user()->id,
            'betting_id' => request()->betting_id,
            'betting_stack' => request()->betting_stack,
            'wining_amount' => request()->wining_amount,
        ]);

        $client_info->update([
            'balance' => $client_info->balance - request()->betting_stack,
         ]);

         return response()->json([
                'balance'=> number_format($client_info->balance, 2, '.', ''),

            ]);
    }
}
