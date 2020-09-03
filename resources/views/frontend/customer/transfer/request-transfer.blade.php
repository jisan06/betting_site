@extends('frontend.customer.index') 

@section('user_breadcrumb')
     <li>
         <a href="{{ route('user.transfer') }}">Transfers</a>
     </li>
     <li>{{$title}}</li>
@endsection

@section('customer_content')

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
                    <form action="{{ route('user.transferRequest') }}" class="crud_from" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <label for="name">Receiver's Username
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" name="to_username" class="form-control" placeholder="Receivers username" value="{{old('to_name')}}" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="phone">Phone Number
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" name="to_phone_no" class="form-control" placeholder="Receivers number for transfer" value="{{old('to_phone_no')}}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <label for="transfer_amount">Transfer Amount
                                        <span class="required">*</span>
                                    </label>
                                    <input type="number" min="0" name="transfer_amount" class="form-control" placeholder="write your deposite amount" value="{{old('transfer_amount')}}" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
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