@extends('frontend.layouts.master') 

@section('content')
@php
	$activeTab=!empty(old('activeTab'))?old('activeTab'):'login';
@endphp
	@section('header_link')
		<ul class="breadcrumb-links">
		    <li><a href="{{ url('/') }}">Home</a></li>
		    <li>Login / Registeration</li>
		</ul>
	@endsection

	<div class="login-register-area mb-60px mt-30px">
		<div class="container">
			<div class="row">
		        <div class="col-lg-8 col-md-12 ml-auto mr-auto">
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
		            <div class="login-register-wrapper">
		                <div class="login-register-tab-list nav">
		                    <a class="{{ $activeTab === 'login' ? 'active' : '' }}" data-toggle="tab" href="#lg1">
		                        <h4>login</h4>
		                    </a>
		                    <a data-toggle="tab" href="#lg2" {{ $activeTab === 'registration' ? 'class=active' : '' }}>
		                        <h4>register</h4>
		                    </a>
		                </div>
		                <div class="tab-content">
		                    <div id="lg1" class="tab-pane {{ $activeTab === 'login' ? 'active' : '' }}">
		                        <div class="login-form-container">
		                            <div class="login-register-form">
		                                <div class="row">
											<div class="col-lg-8 col-md-12 ml-auto mr-auto">
												<form action="{{ route('user.login') }}" class="quotation-form" method="post">
													{{ csrf_field() }}
													<div class="row">
														<div class="col-lg-12 col-sm-12">
															<div class="form-group">
																<label for="name">Email Address / Phone No
																	<span>*</span>
																</label>
																<input type="text" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
															</div>
														</div>
													</div>

													<div class="row">
														<div class="col-lg-12 col-sm-12">
															<div class="form-group">
																<label for="email">Password <span>*</span></label>
																<input type="password" name="password" class="form-control" id="password" required="">
															</div>
														</div>
													</div>

													<div class="row">
														<div class="col-lg-12 text-center">
															<a class="btn btn-info" href="{{ route('user.registration') }}">
																Forget Password ?
															</a>
															<button type="submit" class="btn btn-primary">Login</button>
														</div>
													</div>
												</form>
											</div>
										</div>
		                            </div>
		                        </div>
		                    </div>


		                    <div id="lg2" class="tab-pane {{ $activeTab === 'registration' ? 'active' : '' }}">
		                        @include('frontend.customer.auth.registration')
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
@endsection