@extends('frontend.customer.index') 

@section('user_breadcrumb')
     <li>{{$title}}</li>
@endsection

@section('customer_content')
    <div class="statics-result-map">
        <div class="round-set one">
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6 text-right">
                    <a style="font-size: 16px;margin-top: 14px;" class="btn btn-info" href="{{ route('user.editProfile') }}">
                        <i class="fa fa-edit"></i> Edit Profile
                    </a>                  
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <h6>Balance : ৳ {{number_format($profile->balance,2,'.','') }}</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <tbody>
                                <thead>
                                    <tr style="background: #333;color: #fff;">
                                        <th colspan="6" class="text-center">Profile Information</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <th class="head_name">Name</th>
                                    <td>{{$profile->name}}</td>
                                    <th class="head_name">User Name</th>
                                    <td>{{$profile->username}}</td>
                                </tr>

                                <tr>
                                    <th class="head_name">Phone No</th>
                                    <td>{{$profile->phone}}</td>
                                    <th class="head_name">Sponsor User Name</th>
                                    <td>{{$profile->sponsor_username}}</td>
                                </tr>

                                <tr>
                                    <th class="head_name">Email Address</th>
                                    <td>{{$profile->email}}</td>
                                    <th class="head_name">Club</th>
                                    <td>{{$club->name}}</td>
                                </tr>

                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection