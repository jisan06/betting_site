@extends('frontend.layouts.master') 

@section('content')
<!-- breadcrumb begin -->
<div class="breadcrumb-bettix register-page">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-7">
                <div class="breadcrumb-content">
                    <h2>Login</h2>
                    <ul>
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li>
                            Login
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<!-- login begin -->
<div class="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-8">
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
                    <h3>Login To Your Account</h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-5 col-md-6">
                <div class="login-form">
                    <form action="{{ route('user.login') }}" method="post">
                    	@csrf
                        <input type="text" name="username" value="{{old('username')}}" placeholder="Enter Your user name" required>
                        <input type="password" name="password" placeholder="Enter Your Password" required>
                        <button type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- login end -->
	
@endsection