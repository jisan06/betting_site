@extends('frontend.customer.index') 

@section('user_breadcrumb')
     <li>{{$title}}</li>
@endsection

@section('customer_content')
@php
    use App\Game;
    use App\Bett;
    use App\BettingCategory;
    use App\Match;
    use App\PaymentMethod;
    use App\PaymentNumber;
@endphp
    <div class="statics-result-map">
        <div class="round-set one">
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6 text-right">
                    <a style="font-size: 16px;" class="btn btn-info" href="{{ route('user.depositeRequest') }}">
                        <i class="fa fa-plus-circle"></i> Request Deposite
                    </a>                  
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-bordered table-striped custom_table">
                            <thead>
                                <tr>
                                    <th width="25px">SL</th>
                                    <th width="100px">Date</th>
                                    <th width="100px">Method</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Transaction No</th>
                                    <th width="100px" class="text-right">Amount</th>
                                    <th width="100px" class="text-center">Status</th>
                                    <th width="70px" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sl = 0;
                                    foreach ($customer_deposite_list as $customer_deposite) {
                                        $payment_method = PaymentMethod::find($customer_deposite->payment_method_id);
                                        $payment_to = PaymentNumber::find($customer_deposite->deposite_to);
                                @endphp
                                    <tr>
                                        <td>{{++$sl}}</td>
                                        <td>{{date('d M Y',strtotime($customer_deposite->created_at))}}</td>
                                        <td>{{@$payment_method->name}}</td>
                                        <td>{{$customer_deposite->deposite_from}}</td>
                                        <td>{{@$payment_to->number}}</td>
                                        <td>{{$customer_deposite->transaction_no}}</td>
                                        <td class="text-right">{{$customer_deposite->deposite_amount}}</td>
                                        <td class="text-center">
                                            @if($customer_deposite->status == 0)
                                                Pending
                                            @endif

                                            @if($customer_deposite->status == 1)
                                                Deposited
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('user.depositeview',$customer_deposite->id) }}" class="text-primary ">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                        </td>
                                    </tr>
                                @php
                                    }
                                @endphp
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection