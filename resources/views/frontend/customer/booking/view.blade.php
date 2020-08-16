@extends('frontend.layouts.master') 

@section('content')
@section('header_link')
    <ul class="breadcrumb-links">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ route('user.booking') }}">Booking List</a></li>
        <li>Booking Details</li>
    </ul>
@endsection
<div class="login-register-area mb-60px">
    <div class="container">
        <div class="card-body">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>{{$title}}</h3>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-sm booking_info">
                    <tbody>
                        <thead>
                            <tr style="background: #333;color: #fff;">
                                <th colspan="6" class="text-center">Booking Information</th>
                            </tr>
                        </thead>
                        <tr>
                            <th class="head_name" width="20%">Date</th>
                            <td width="32%">{{date('d-M-Y',strtotime($booking->date))}}</td>
                            <th class="head_name" width="15%">Pickup Time</th>
                            <td width="35%">{{$booking->travel_time}}</td>
                        </tr>

                        <tr>
                            <th class="head_name">Recomended Seat QTY</th>
                            <td>{{$booking->seat_qty}}</td>
                            <th class="head_name">Location</th>
                            <td>{{$location->name}}</td>
                        </tr>

                        <tr>
                            <th class="head_name">Pickup Location</th>
                            <td>{{$booking->puckup_location}}</td>
                            <th class="head_name">Drop Location</th>
                            <td>{{$booking->drop_location}}</td>
                        </tr>

                        <tr>
                            <th class="head_name">Note</th>
                            <td>{{$booking->note}}</td>
                            <th class="head_name">Booking Status</th>
                            <td>
                                @if($booking->bookingStatus == 0)
                                    Pending
                                @elseif($booking->status == 1)
                                    Booked
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>  
    </div>
</div>
@endsection