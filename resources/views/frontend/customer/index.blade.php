@extends('frontend.layouts.master') 

@section('content')
    <!-- breadcrumb begin -->
    <div class="breadcrumb-bettix register-page">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-7">
                    <div class="breadcrumb-content">
                        <h2>{{$title}}</h2>
                        <ul>
                            <li>
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li>
                                {{$title}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
	<div class="statics-page">
        <div class="container">
            <div class="betting-table">
                <div class="row">
                	@include('frontend.customer.element.left_sidebar')

	            	<div class="col-xl-10 col-lg-10">
                    	<div class="tab-content bet-tab-content" id="myTabContent">
                        	<div class="tab-pane fade show active" id="football" role="tabpanel" aria-labelledby="football-tab">
                        		<h4 class="tab-title">{{@$title}}{{-- <i class="flaticon-football"></i> --}}</h4>
                        		@yield('customer_content')
                        	</div>
                        </div>
	            	</div>
     			</div>
            </div>
        </div>
    </div>
@endsection