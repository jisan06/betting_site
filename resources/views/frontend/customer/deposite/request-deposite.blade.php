@extends('frontend.customer.index') 

@section('user_breadcrumb')
     <li>
         <a href="{{ route('user.betts') }}">My Bets</a>
     </li>
     <li>{{$title}}</li>
@endsection

@section('customer_content')
@php
    $deposited_number_array = array(
                                    '01923943943' => '01923943943',
                                    );
@endphp
    <div class="statics-result-map">
        <div class="round-set one">
            <div class="row">
                <div class="col-lg-12 col-md-12 ml-auto mr-auto">
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
                    <form action="{{ route('user.depositeRequest') }}" class="crud_from" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="phone">From (Bkash)
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" name="deposite_from" class="form-control" placeholder="write your bkash no where from you deposite" value="{{old('deposite_from')}}" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <label for="name">To (Bkash)
                                        <span class="required">*</span>
                                    </label>
                                    <select class="form-control" name="deposite_to" required>
                                        <option value="">Select Number</option>
                                        @foreach ($deposited_number_array as $key => $value)
                                            <option value="{{$value}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="phone">Transaction No
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" name="transaction_no" class="form-control" placeholder="write your bkash transaction no" value="{{old('transaction_no')}}" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <label for="name">Deposite Amount
                                        <span class="required">*</span>
                                    </label>
                                    <input type="number" name="deposite_amount" class="form-control" placeholder="write your deposite amount" value="{{old('deposite_amount')}}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i>
                                    SAVE
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection