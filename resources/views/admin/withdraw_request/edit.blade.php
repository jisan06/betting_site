@extends('admin.layouts.master')

@section('content')
<form class="form-horizontal" action="{{ route('withdrawRequest.update',$customer_withdraw_details->id) }}" id="formAddEdit" method="POST" enctype="multipart/form-data" name="form">
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
                        <input type="text" class="form-control" value="{{@$customer_details->name}}" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="phone">Phone No</label>
                    <div class="form-group ">
                        <input type="text" class="form-control" value="{{@$customer_details->phone}}" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="email">Email Address</label>
                    <div class="form-group ">
                        <input type="text" class="form-control" value="{{@$customer_details->email}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="team_one">Withdraw Date</label>
                    <div class="form-group ">
                        <input type="text" class="form-control"  value="{{date('d M Y',strtotime($customer_withdraw_details->created_at))}}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="deposite_from">Withdraw To</label>
                    <div class="form-group">
                        <input type="text" class="form-control"  value="{{$customer_withdraw_details->withdraw_number}}" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="deposite_amount">Withdraw Amount</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="withdraw_amount" value="{{$customer_withdraw_details->withdraw_amount}}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="publication-status">Is Withdrawn ?</label>
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
        document.forms['form'].elements['status'].value = "{{$customer_withdraw_details->status}}";
    </script>
@endsection