@extends('frontend.customer.index') 

@section('customer_content')
    <div class="statics-result-map">
        <div class="round-set one">
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6 text-right">
                    <a style="font-size: 16px;margin-top: 14px;" class="btn btn-info" href="{{ route('user.editProfile') }}">
                        <i class="las la-plus-circle"></i> Edit Profile
                    </a>                  
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    @if(file_exists($profile->image))
                        <img src="{{ asset($profile->image) }}" style="height: 120px;">
                    @endif
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-sm booking_info">
                    <tbody>
                        <thead>
                            <tr style="background: #333;color: #fff;">
                                <th colspan="6" class="text-center">Profile Information</th>
                            </tr>
                        </thead>
                        <tr>
                            <th class="head_name">Name</th>
                            <td>{{$profile->name}}</td>
                            <th class="head_name">Phone No</th>
                            <td>{{$profile->phone}}</td>
                        </tr>

                        <tr>
                            <th class="head_name">Email Address</th>
                            <td>{{$profile->email}}</td>
                            <th class="head_name">Address</th>
                            <td>{{$profile->address}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection