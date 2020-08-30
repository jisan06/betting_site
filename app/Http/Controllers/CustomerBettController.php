<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Client;
use App\CustomerBett;

class CustomerBettController extends Controller
{  

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
