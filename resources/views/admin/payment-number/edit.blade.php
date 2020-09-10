@extends('admin.layouts.master')

@section('content')
<form class="form-horizontal" action="{{ route('payment-number.update',$payment_number->id) }}" id="formAddEdit" method="POST" enctype="multipart/form-data" name="form">
    {{ csrf_field() }}
    @method('PUT')

    <div class="card">
        <div class="custom-card-header">
            <div class="row">
                <div class="col-md-6"><h4 class="custom-card-title">{{ $title }}</h4></div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-outline-info btn-lg" href="{{ route($goBackLink) }}">
                        <i class="fa fa-arrow-circle-left"></i> Go Back
                    </a>
                    <button type="submit" class="btn btn-outline-info btn-lg waves-effect buttonAddEdit" name="buttonAddEdit" value="Save"><i class="fa fa-save"></i> {{ $buttonName }}</button>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6"> 
                    <div class="form-group {{ $errors->has('game_id') ? ' has-danger' : '' }}">
                        <label for="payment_method_id">Payment Method</label>
                        <select class="form-control select2" name="payment_method_id" required>
                            <option value=""> Select Payment Method</option>
                            @foreach($payment_methods as $payment_method)

                            @php
                                if ($payment_method->id == $payment_number->payment_method_id)
                                {
                                    $select = 'selected';
                                }
                                else
                                {
                                    $select = '';
                                }
                            @endphp

                                <option value="{{$payment_method->id}}" {{ $select }}>{{$payment_method->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('payment_method_id'))
                            @foreach($errors->get('payment_method_id') as $error)
                                <div class="form-control-feedback">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>                                       
                </div>                
                <div class="col-md-6">
                    <label for="number">Payment Number</label>
                    <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                        <input type="text" class="form-control" placeholder="Payment Number" name="number" value="{{ $payment_number->number }}" required>
                        @if ($errors->has('number'))
                            @foreach($errors->get('number') as $error)
                                <div class="form-control-feedback">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="order-by">Order By</label>
                    <div class="form-group {{ $errors->has('order_by') ? ' has-danger' : '' }}">
                        <input type="number" class="form-control" placeholder="Order By" name="order_by" value="{{ $payment_number->order_by }}" required>
                        @if ($errors->has('order_by'))
                            @foreach($errors->get('order_by') as $error)
                                <div class="form-control-feedback">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="publication-status">Publication Status</label>
                    <div class="form-group {{ $errors->has('status') ? ' has-danger' : '' }}" style="height: 40px; line-height: 40px;">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" id="published" name="status" class="form-check-input" value="1" required>Published
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" id="unpublished" name="status" class="form-check-input" value="0">Unpublished
                            </label>
                        </div>                          
                    </div>
                </div>  
            </div>
        </div>

        <div class="custom-card-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-outline-info btn-lg waves-effect buttonAddEdit" name="buttonAddEdit" value="Save"><i class="fa fa-save"></i> {{ $buttonName }}</button>
                </div>
            </div>              
        </div>
    </div>
</form>

<script type="text/javascript">
    document.forms['form'].elements['status'].value = "{{$payment_number->status}}";
</script>
@endsection