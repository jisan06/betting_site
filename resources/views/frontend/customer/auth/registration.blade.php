@extends('frontend.layouts.master') 

@section('content')
	<!-- breadcrumb begin -->
    <div class="breadcrumb-bettix register-page">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-7">
                    <div class="breadcrumb-content">
                        <h2>Register</h2>
                        <ul>
                            <li>
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li>
                                Registration
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- breadcrumb end -->

	<div class="register">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-8">
                	@if( count($errors) > 0 )
				        <div class="alert alert-danger alert-dismissible">
				            <button type="button" class="close" data-dismiss="alert">&times;</button>
				            <strong style="font-weight: bold;color: #e4280a;font-size: 16px;">
				                Sorry !
				            </strong> 
				            <strong style="font-weight: bold;color: #ca0c0c;;">
				                {{ $errors->first() }}
				            </strong>
				        </div>
				    @endif

				    @if (Session::get('message'))
				        <div class="alert alert-success alert-dismissible">
				            <button type="button" class="close" data-dismiss="alert">&times;</button>
				            <strong>Success!</strong> {{ Session::get('message') }}
				        </div>
				    @endif
                    <div class="section-title">
                        <h3>Create Your Account</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-9">
                    <div class="all-form">
                        <div class="single-form" id="first-step">
                            <form action="{{ route('user.registration') }}" method="post">
                            	@csrf
                            	<div class="row">
                            		<div class="col-xl-6 col-lg-6 col-md-6">
                            			<div class="form-group">
	                                    	<label for="name">Full Name 
	                                    		<span class="required">*</span>
	                                    	</label>
                            				<input type="text" value="{{old('name')}}" id="name" name="name" required>
                            			</div>
	                                </div>

	                                <div class="col-xl-6 col-lg-6 col-md-6">
                            			<div class="form-group">
                                    		<label for="username">User Name 
                                    			<span class="required">*</span>
                                    		</label>
                            				<input type="text" value="{{old('username')}}" id="username" name="username" required>
                            			</div>
	                                </div>
                            	</div>

                            	<div class="row">
	                                <div class="col-xl-6 col-lg-6 col-md-6">
                            			<div class="form-group">
                                    		<label for="phone">Mobile Number 
                                    			<span class="required">*</span>
                                    		</label>
                            				<input type="text" value="{{old('phone')}}" id="phone" name="phone" required>
                            			</div>
	                                </div>

                            		<div class="col-xl-6 col-lg-6 col-md-6">
                            			<div class="form-group">
                                    		<label for="sponsor_username">Sponsor User Name</label>
                            				<input type="text" value="{{old('sponsor_username')}}" id="sponsor_username" name="sponsor_username">
                            			</div>
	                                </div>
                            	</div>

                            	<div class="row">
	                                <div class="col-xl-6 col-lg-6 col-md-6">
                            			<div class="form-group">
                            				<label for="phone">Club</label>
                            				<p style="padding-bottom:5px;"></p>
		                                    <select class="form-control select2" name="club_id">
		                                    	<option value="">Select Club</option>
		                                    	@foreach ($club_list as $club)
		                                    	@php
		                                    		if(old('club_id') == $club->id){
		                                    			$selected = 'selected';
		                                    		}else{
		                                    			$selected = '';
		                                    		}
		                                    	@endphp
		                                    		<option {{@$selected}} value="{{$club->id}}">{{$club->name}}</option>
		                                    	@endforeach
		                                    </select>
                            			</div>
	                                </div>

                            		<div class="col-xl-6 col-lg-6 col-md-6">
                            			<div class="form-group">
                                    		<label for="email">Email Address</label>
                            				<input type="email" value="{{old('email')}}" name="email" id="email">
                            			</div>
	                                </div>
                            	</div>

                            	<div class="row">
	                                <div class="col-xl-6 col-lg-6 col-md-6">
                            			<div class="form-group">
                                    		<label for="password">Password 
                                    			<span class="required">*</span>
                                    		</label>
                            				<input type="password" id="password" name="password" required>
                            			</div>
	                                </div>

                            		<div class="col-xl-6 col-lg-6 col-md-6">
                            			<div class="form-group">
                                    		<label for="confirm_password">Confirm Password 
                                    			<span class="required">*</span>
                                    		</label>
                            				<input type="password" id="confirm_password" name="confirm_password" required>
                            			</div>
	                                </div>
                            	</div>
                                <button class="next" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection