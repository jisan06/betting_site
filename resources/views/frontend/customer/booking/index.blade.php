@extends('frontend.layouts.master') 

@section('content')
@section('header_link')
    <ul class="breadcrumb-links">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Booking</li>
    </ul>
@endsection

<div class="login-register-area mb-60px">
    <div class="container">
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
        <div class="card-body">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>{{$title}}</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a style="font-size: 16px;margin-top: 14px" class="btn btn-info" href="{{ route('user.bookingCreate') }}">
                            <i class="las la-plus-circle"></i> Create Booking
                        </a>                  
                    </div>
                </div>
            </div>

            <div class="table-responsive booking_section">
                <table id="dataTable" class="table table-bordered table-striped customer_table">
                    <thead>
                        <tr>
                            <th rowspan="2" width="25px">SL</th>
                            <th rowspan="2" width="90px">Date</th>
                            <th class="text-center">Name</th>
                            <th rowspan="2" width="120px">Phone No</th>
                            <th rowspan="2" width="200px">Location</th>
                            <th rowspan="2" width="200px">Pickup Location</th>
                            <th rowspan="2" width="200px">Drop Location</th>
                            <th rowspan="2" width="110px">Status</th>
                            <th rowspan="2" width="110px">Travel Status</th>
                            <th class="text-center" rowspan="2" width="180px">Action</th>
                        </tr>

                        <tbody>
                            @php
                                $sl = 0;
                                foreach ($booking_list as $booking) {
                                    $sl++;
                                @endphp
                                <tr>
                                    <td>{{$sl}}</td>
                                    <td>{{date('Y-m-d',strtotime($booking->date))}}</td>
                                    <td>{{$booking->name}}</td>
                                    <td>{{$booking->phone}}</td>
                                    <td>{{$booking->locationName}}</td>
                                    <td>{{$booking->puckup_location}}</td>
                                    <td>{{$booking->drop_location}}</td>
                                    <td>
                                        @if($booking->bookingStatus == 0)
                                            Pending
                                        @elseif($booking->status == 1)
                                            Booked
                                        @endif
                                    </td>
                                    <td>
                                        @if($booking->travel_status == 0)
                                            Pending
                                        @elseif($booking->travel_status == 1)
                                            Complete
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('user.bookingView',$booking->bookingId) }}" class="edit_link">
                                            <i class="fa fa-eye"></i> View
                                        </a> 
                                        <span style="margin-left: 5px;margin-right: 5px;">||</span>
                                        @if($booking->bookingStatus == 0)
                                            <a href="{{ route('user.bookingEdit',$booking->bookingId) }}" class="edit_link">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                        @elseif($booking->status == 1)
                                            <a title="Your seat already booked. can not edit your booking" class="edit_link">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                        @endif                                                     
                                    </td>
                                </tr>
                            @php
                                }
                            @endphp
                        </tbody>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>  
    </div>
</div>
@endsection