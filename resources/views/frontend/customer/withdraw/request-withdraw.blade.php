@extends('frontend.customer.index') 

@section('user_breadcrumb')
     <li>
         <a href="{{ route('user.betts') }}">My Bets</a>
     </li>
     <li>{{$title}}</li>
@endsection

@section('customer_content')
@php
    $payment_types = array(
                            'Agent' => 'Agent',
                            'Personal' => 'Personal',
                          );
@endphp
@php
    use App\PaymentMethod;
    $payment_methods = PaymentMethod::orderBy('name','asc')->get();
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
                    <form action="{{ route('user.withdrawRequest') }}" class="crud_from" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <label for="name">Payment Method
                                        <span class="required">*</span>
                                    </label>
                                    <select class="form-control" name="payment_method_id" required>
                                        <option value="">Select Payment Method</option>
                                        @foreach ($payment_methods as $key => $payment_method)
                                            <option value="{{$payment_method->id}}">{{$payment_method->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <label for="name">Payment Type
                                        <span class="required">*</span>
                                    </label>
                                    <select class="form-control" name="payment_type" required>
                                        <option value="">Select Payment Type</option>
                                        @foreach ($payment_types as $key => $value)
                                            <option value="{{$value}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="phone">Withdraw Number
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" name="withdraw_number" class="form-control" placeholder="write your number for transection" value="{{old('withdraw_number')}}" required>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <label for="name">Withdraw Amount
                                        <span class="required">*</span>
                                    </label>
                                    <input type="number" name="withdraw_amount" class="form-control" placeholder="write your deposite amount" value="{{old('withdraw_amount')}}" required>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <label for="name">Password
                                        <span class="required">*</span>
                                    </label>
                                    <input type="Password" name="password" class="form-control" placeholder="Write Your Password" value="{{old('password')}}" required>
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