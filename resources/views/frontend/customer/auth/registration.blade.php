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
                                <a href="#">Home</a>
                            </li>
                            <li>
                                <a href="#">Pages</a>
                            </li>
                            <li>
                                Contact
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
                    <div class="section-title">
                        <h3>Create Your Account</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-9">
                    <div class="all-form">
                        <div class="single-form" id="first-step">
                            <form>
                            	<div class="row">
                            		<div class="col-xl-6 col-lg-6 col-md-6">
                            			<div class="form-group">
	                                    	<label for="firstName">Full Name 
	                                    		<span class="required">*</span>
	                                    	</label>
                            				<input type="text" value="" id="firstName" required>
                            			</div>
	                                </div>

	                                <div class="col-xl-6 col-lg-6 col-md-6">
                            			<div class="form-group">
                                    		<label for="lastName">User Name 
                                    			<span class="required">*</span>
                                    		</label>
                            				<input type="text" value="" id="lastName" required>
                            			</div>
	                                </div>
                            	</div>

                            	<div class="row">
	                                <div class="col-xl-6 col-lg-6 col-md-6">
                            			<div class="form-group">
                                    		<label for="emailAdd">Mobile Number 
                                    			<span class="required">*</span>
                                    		</label>
                            				<input type="text" id="emailAdd" required>
                            			</div>
	                                </div>

                            		<div class="col-xl-6 col-lg-6 col-md-6">
                            			<div class="form-group">
                                    		<label for="lastName">Sponsor User Name</label>
                            				<input type="text" value="" id="lastName" required>
                            			</div>
	                                </div>
                            	</div>

                            	<div class="row">
	                                <div class="col-xl-6 col-lg-6 col-md-6">
                            			<div class="form-group">
                            				<label for="emailAdd">Club</label>
                            				<p style="padding-bottom:5px;"></p>
		                                    <select class="form-control">
		                                    	<option value="">Select Club</option>
		                                    </select>
                            			</div>
	                                </div>

                            		<div class="col-xl-6 col-lg-6 col-md-6">
                            			<div class="form-group">
                                    		<label for="emailAdd">Email Address</label>
                            				<input type="email" id="emailAdd">
                            			</div>
	                                </div>
                            	</div>

                            	<div class="row">
	                                <div class="col-xl-6 col-lg-6 col-md-6">
                            			<div class="form-group">
                                    		<label for="emailAdd">Password 
                                    			<span class="required">*</span>
                                    		</label>
                            				<input type="text" id="emailAdd" required>
                            			</div>
	                                </div>

                            		<div class="col-xl-6 col-lg-6 col-md-6">
                            			<div class="form-group">
                                    		<label for="emailAdd">Confirm Password 
                                    			<span class="required">*</span>
                                    		</label>
                            				<input type="text" id="emailAdd" required>
                            			</div>
	                                </div>
                            	</div>

                                <p>By clicking "NEXT", you confirm that you have read and understood the Bettix <a href="#">Privacy & Coockie Policy</a>, and agree to its terms.</p>
                                <button class="next" type="submit">Next</button>
                            </form>
                        </div>
                        <div class="single-form" id="second-step">
                            <form>
                                <div>
                                    <input type="text" id="countryName">
                                    <label for="countryName">Country</label>
                                </div>
                                <div>
                                    <input type="text" id="address-line">
                                    <label for="address-line">address line 1</label>
                                </div>
                                <div>
                                    <input type="text" id="address-line-2">
                                    <label for="address-line-2">address line 2</label>
                                </div>
                                <div>
                                    <input type="text" id="cityName">
                                    <label for="cityName">city Name</label>
                                </div>
                                <div>
                                    <input type="text" id="mobileNumber">
                                    <label for="mobileNumber">mobile Number</label>
                                </div>
                                <p>By clicking "NEXT", you confirm that you have read and understood the Bettix <a href="#">Privacy & Coockie Policy</a>, and agree to its terms.</p>
                                <button class="next">Next</button>
                            </form>
                        </div>
                        <div class="single-form" id="third-step">
                            <form>
                                <div>
                                    <input type="text" id="userName">
                                    <label for="userName">user Name</label>
                                </div>
                                <div>
                                    <input type="password" id="passwordNo">
                                    <label for="passwordNo">password</label>
                                </div>
                                <div>
                                    <input type="password" id="passwordAgain">
                                    <label for="passwordAgain">re-enter password</label>
                                </div>
                                <div>
                                    <input type="text" id="securityQuote">
                                    <label for="securityQuote">security Quote</label>
                                </div><p>By clicking "NEXT", you confirm that you have read and understood the Bettix <a href="#">Privacy & Coockie Policy</a>, and agree to its terms.</p>
                                <button class="next">Next</button>
                            </form>
                        </div>
                        <div class="final-step" id="fourth-step">
                            <div class="icon-completed">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                                    <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
                                    <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
                                </svg>
                                <span class="text">Yeah! Almost Done!</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection