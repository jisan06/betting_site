@extends('admin.layouts.master')

@section('content')
	<style type="text/css">
	    .nav-tabs .nav-link:not(:active) {
	       background: #7a7b7b;
	        color: #fff;
	    }

	    .top_card{
	    	height: 130px;
	    }

	    .nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link {
	       background: #00c292;
	        color: #fff;
	    }

	    .first_block_title p{
	    	color: #00c292;
		    text-transform: uppercase;
		    font-weight: bold;
		    margin-bottom: 0px;
		    margin-top: 7px;
		    font-size: 12px;
	    }

	    .first_block_title a{
	    	color: #00c292;
    		font-size: 16px;
	    }

	    .second_block_title p{
	    	color: #1f9a11;
		    text-transform: uppercase;
		    font-weight: bold;
		    margin-bottom: 0px;
		    margin-top: 7px;
		    font-size: 12px;
	    }

	    .second_block_title a{
	    	color: #1f9a11;
    		font-size: 16px;
	    }

	    .third_block_title p{
	    	color: #089faf;
		    text-transform: uppercase;
		    font-weight: bold;
		    margin-bottom: 0px;
		    margin-top: 7px;
		    font-size: 12px;
	    }

	    .third_block_title a{
	    	color: #089faf;
    		font-size: 16px;
	    }

	    .fourth_block_title p{
	    	color: #2329ea;
		    text-transform: uppercase;
		    font-weight: bold;
		    margin-bottom: 0px;
		    margin-top: 7px;
		    font-size: 12px;
	    }

	    .fourth_block_title a{
	    	color: #2329ea;
    		font-size: 16px;
	    }

	</style>

	<div class="row">
		<div class="col-lg-3">
			<div class="card top_card">
		        <div class="card-body">
		        	<div class="row">
		        		<h3>
		        			<a href="" style="font-size: unset;color: unset;">
		        				<i class="fa fa-plus"></i>
		        			</a>
		        		</h3>
		        	</div>
		            <div class="row first_block_title">
		                <div class="col-md-10">
		                    <div class="d-flex no-block align-items-center">
		                        <div>
		                            <a href="" style="font-size: unset;">
		                            	<p>New Order</p>
		                            </a>
		                        </div>
		                    </div>
		                </div>

		                <div class="col-md-2">
		                	<div class="d-flex no-block align-items-center">
		                        <div class="ml-auto">
		                            <h3 class="counter text-primary"><a href=""></a></h3>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="col-lg-3">
			<div class="card top_card">
		        <div class="card-body">
		        	<div class="row">
		        		<h3><i class="fa fa-refresh"></i></h3>
		        	</div>
		            <div class="row second_block_title">
		                <div class="col-md-10">
		                    <div class="d-flex no-block align-items-center">
		                        <div>
		                            <p>Current Order</p>
		                            <p>Processing Order</p>
		                        </div>
		                    </div>
		                </div>

		                <div class="col-md-2">
		                	<div class="d-flex no-block align-items-center">
		                        <div class="ml-auto">
		                            <h3 class="counter text-primary"><a href="javascript:0"></a></h3>
		                            <h3 class="counter text-primary"><a href="javascript:0"></a></h3>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="col-lg-3">
			<div class="card top_card">
		        <div class="card-body">
		        	<div class="row">
		        		<h3><i class="fa fa-toggle-on" aria-hidden="true"></i></i></h3>
		        	</div>
		            <div class="row third_block_title">
		                <div class="col-md-10">
		                    <div class="d-flex no-block align-items-center">
		                        <div>
		                            <p>Complete Order</p>
		                            <p>Canceled Order</p>
		                        </div>
		                    </div>
		                </div>

		                <div class="col-md-2">
		                	<div class="d-flex no-block align-items-center">
		                        <div class="ml-auto">
		                            <h3 class="counter text-primary">
		                            	<a href="javascript:0"></a>
		                            	<a href="javascript:0">0</a>
		                            </h3>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="col-lg-3">
			<div class="card top_card">
		        <div class="card-body">
		        	<div class="row">
		        		<h3><i class="fa fa-money"></i></h3>
		        	</div>
		            <div class="row fourth_block_title">
		                <div class="col-md-10">
		                    <div class="d-flex no-block align-items-center">
		                        <div>
		                            <p>Total Amount</p>
		                            <p>Due Amount</p>
		                        </div>
		                    </div>
		                </div>

		                <div class="col-md-2">
		                	<div class="d-flex no-block align-items-center">
		                        <div class="ml-auto">
		                            <h3 class="counter text-primary"><a href="javascript:0"></a></h3>
		                            <h3 class="counter text-primary"><a href="javascript:0">0</a></h3>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	</div>

	<br>
@endsection
