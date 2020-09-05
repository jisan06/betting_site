@extends('frontend.customer.index') 

@section('customer_content')
	<div class="statics-result-map">
	    <div class="round-set">
	        <div class="row">
	            <div class="col-xl-3 col-lg-3">
	                <div class="single-game">
	                    <ul>
	                        <li>
	                            <span class="player-name">Pending Deposit</span>
	                            <span class="point">{{count($new_deposit_request)}}</span>
	                        </li>
	                    </ul>
	                </div>
	            </div>

	            <div class="col-xl-3 col-lg-3">
	                <div class="single-game">
	                    <ul>
	                        <li>
	                            <span class="player-name">Pending Withdraw</span>
	                            <span class="point">{{count($new_withdraw_request)}}</span>
	                        </li>
	                    </ul>
	                </div>
	            </div>

	            <div class="col-xl-3 col-lg-3">
	                <div class="single-game">
	                    <ul>
	                        <li>
	                            <span class="player-name">Balance Transfer</span>
	                            <span class="point">৳ {{$total_transfer}}</span>
	                        </li>
	                    </ul>
	                </div>
	            </div>

	            <div class="col-xl-3 col-lg-3">
	                <div class="single-game">
	                    <ul>
	                        <li>
	                            <span class="player-name">Balance</span>
	                            <span class="point">৳ {{\Auth::guard('customer')->user()->balance}}</span>
	                        </li>
	                    </ul>
	                </div>
	            </div>
	    	</div>
		</div>
	</div>
@endsection