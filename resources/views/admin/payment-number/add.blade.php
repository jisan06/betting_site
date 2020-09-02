@extends('admin.layouts.masterAddEdit')

@section('card_body')

<div class="card-body">
    <div class="row">
        <div class="col-md-6"> 
            <div class="form-group {{ $errors->has('game_id') ? ' has-danger' : '' }}">
                <label for="payment_method_id">Payment Method</label>
                <select class="form-control select2" name="payment_method_id" required>
                    <option value="">Payment Method</option>
                    @foreach($payment_methods as $payment_method)
                        <option value="{{$payment_method->id}}">{{$payment_method->name}}</option>
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
                <input type="text" class="form-control" placeholder="Payment Number" name="number" value="{{ old('number') }}" required>
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
                <input type="number" class="form-control" placeholder="Order By" name="order_by" value="{{ old('order_by') }}" required>
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
                        <input type="radio" id="published" name="status" class="form-check-input" checked="" value="1" required>Published
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

@endsection