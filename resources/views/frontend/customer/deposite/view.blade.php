@extends('frontend.customer.index') 

@section('user_breadcrumb')
     <li>
         <a href="{{ route('user.deposite') }}">My Deposite</a>
     </li>
     <li>{{$title}}</li>
@endsection
@php
    use App\PaymentMethod;
    use App\PaymentNumber;

    $payment_method = PaymentMethod::find($customer_deposite_details->payment_method_id);
    $payment_to = PaymentNumber::find($customer_deposite_details->deposite_to);
@endphp
@section('customer_content')
    <div class="statics-result-map">
        <div class="round-set one">

            <div class="table-responsive">
                <table class="table table-bordered table-sm details_table">
                    <tbody>
                        <thead>
                            <tr style="background: #333;color: #fff;">
                                <th colspan="6" class="text-center">Deposite Details of ({{date('d M Y',strtotime($customer_deposite_details->created_at))}})</th>
                            </tr>
                        </thead>
                        <tr>
                            <th class="head_name">Deposite Date</th>
                            <td>{{date('d M Y',strtotime($customer_deposite_details->created_at))}}</td>
                            <th class="head_name">Deposite From</th>
                            <td>{{$customer_deposite_details->deposite_from}}</td>
                        </tr>
                        <tr>
                            <th class="head_name">Transaction No</th>
                            <td>{{$customer_deposite_details->transaction_no}}</td>
                            <th class="head_name">Deposite To</th>
                            <td>{{$payment_to->number}} ({{@$payment_method->name}})</td>
                        </tr>

                        <tr>
                            <th class="head_name">Depsite Amount</th>
                            <td>{{$customer_deposite_details->deposite_amount}}</td>
                            <th class="head_name">Depsite Status</th>
                            <td>
                                @if($customer_deposite_details->status == 0)
                                    Pending
                                @endif

                                @if($customer_deposite_details->status == 1)
                                    Deposited
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection