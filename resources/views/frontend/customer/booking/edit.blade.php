@extends('frontend.layouts.master') 

@section('content')
@php
    $seat_qty_list = array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5');
@endphp
@section('header_link')
    <ul class="breadcrumb-links">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ route('user.booking') }}">Booking</a></li>
        <li>Create Booking</li>
    </ul>
@endsection
<div class="login-register-area mb-60px">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-12 ml-auto mr-auto">
                <h3 class="text-center">{{$title}}</h3>
                <div class="card-body">
                    <form class="crud_form" action="{{ route('user.bookingEdit',$booking->id) }}"method="POST" enctype="multipart/form-data" name="form">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-3">
                                <label for="booking_date">Booking Date</label>
                                <div class="form-group">
                                    <input  type="text" class="form-control datepicker" value="{{date('d-m-Y',strtotime($booking->date))}}" id="booking_date" name="booking_date" placeholder="Select Delivery Date" required="" readonly="">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="travel_time">Piclup Time</label>
                                <div class="form-group">
                                    <input type="text" class="form-control " name="travel_time" placeholder="example: 3 pm" value="{{$booking->travel_time}}" required="">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="seat_qty">Recomended Seat QTY</label>
                                <div class="form-group">
                                    <select class="form-control" name="seat_qty" required="">
                                        <option value="">Select Quantity</option>
                                        @foreach ($seat_qty_list as $key=>$value)
                                            @php
                                                if($booking->seat_qty == $key){
                                                    $selected = 'selected';
                                                }else{
                                                    $selected = '';
                                                }
                                            @endphp
                                           <option {{$selected  }} value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="location_id">Location</label>
                                <div class="form-group">
                                    <select class="form-control{{--  chosen-select --}}" name="location_id" required="">
                                        <option value="">Select Location</option>
                                        @foreach ($location_list as $location)
                                            @php
                                                if($booking->location_id == $location->id){
                                                    $selected = 'selected';
                                                }else{
                                                    $selected = '';
                                                }
                                            @endphp
                                           <option {{$selected}} value="{{$location->id}}">{{$location->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="puckup_location">Pickup Location</label>
                                        <div class="form-group">
                                            <textarea class="form-control" name="puckup_location" placeholder="write your pickup location" required="" rows="3">{{$booking->puckup_location}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="drop_location">Drop Location</label>
                                        <div class="form-group">
                                            <textarea class="form-control" name="drop_location" placeholder="write your drop location" required="" rows="3">{{$booking->drop_location}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="note">Note</label>
                                <textarea class="form-control" name="note" rows="9">{{$booking->note}}</textarea>
                            </div>
                        </div>
                        <div class="custom-card-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-info" value="Save">
                                        <i class="fa fa-save"></i> {{ $buttonName }}
                                    </button>
                                </div>
                            </div>              
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection