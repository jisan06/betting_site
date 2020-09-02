@extends('admin.layouts.master')

@section('content')
@php
    use App\PaymentMethod;
    use App\PaymentNumber;

    $payment_method = PaymentMethod::find($customer_deposite_details->payment_method_id);
    $payment_to = PaymentNumber::find($customer_deposite_details->deposite_to);
@endphp
<form class="form-horizontal" action="{{ route('depositeRequest.update',$customer_deposite_details->id) }}" id="formAddEdit" method="POST" enctype="multipart/form-data" name="form">
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
                <div class="col-md-4">
                    <label for="name">Client Name</label>
                    <div class="form-group ">
                        <input type="text" class="form-control" value="{{$customer_details->name}}" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="phone">Phone No</label>
                    <div class="form-group ">
                        <input type="text" class="form-control" value="{{$customer_details->phone}}" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="email">Email Address</label>
                    <div class="form-group ">
                        <input type="text" class="form-control" value="{{$customer_details->email}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="team_one">Deposite Date</label>
                    <div class="form-group ">
                        <input type="text" class="form-control"  value="{{date('d M Y',strtotime($customer_deposite_details->created_at))}}" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="payment_method">Payment Method</label>
                    <div class="form-group">
                        <input type="text" class="form-control" value="{{@$payment_method->name}}" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="deposite_from">Deposite From</label>
                    <div class="form-group">
                        <input type="text" class="form-control" value="{{$customer_deposite_details->deposite_from}}" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="deposite_from">Deposite To</label>
                    <div class="form-group">
                        <input type="text" class="form-control"  value="{{@$payment_to->number}}" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label for="transaction_no">Transaction No</label>
                    <div class="form-group ">
                        <input type="text" class="form-control"  value="{{$customer_deposite_details->transaction_no}}" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="deposite_amount">Deposite Amount</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="deposite_amount" value="{{$customer_deposite_details->deposite_amount}}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="publication-status">Is Deposited ?</label>
                        <div class="form-group" style="height: 40px; line-height: 40px;">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" id="published" name="status" class="form-check-input" checked="" value="1" required>Yes
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" id="unpublished" name="status" class="form-check-input" value="0">No
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
        document.forms['form'].elements['status'].value = "{{$customer_deposite_details->status}}";
    </script>
@endsection