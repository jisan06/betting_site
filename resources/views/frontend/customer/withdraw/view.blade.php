@extends('frontend.customer.index') 

@section('user_breadcrumb')
     <li>
         <a href="{{ route('user.withdraw') }}">My Withdrawal</a>
     </li>
     <li>{{$title}}</li>
@endsection

@section('customer_content')
    <div class="statics-result-map">
        <div class="round-set one">

            <div class="table-responsive">
                <table class="table table-bordered table-sm details_table">
                    <tbody>
                        <thead>
                            <tr style="background: #333;color: #fff;">
                                <th colspan="6" class="text-center">Withdraw Details of ({{date('d M Y',strtotime($customer_withdraw_details->created_at))}})</th>
                            </tr>
                        </thead>
                        <tr>
                            <th class="head_name">Withdraw Date</th>
                            <td>{{date('d M Y',strtotime($customer_withdraw_details->created_at))}}</td>
                            
                            <th class="head_name">Withdraw To</th>
                            <td>{{$customer_withdraw_details->withdraw_number}}</td>
                        </tr>

                        <tr>
                            <th class="head_name">Withdraw Amount</th>
                            <td>{{$customer_withdraw_details->withdraw_amount}}</td>
                            <th class="head_name">Withdraw Status</th>
                            <td>
                                @if($customer_withdraw_details->status == 0)
                                    Pending
                                @endif

                                @if($customer_withdraw_details->status == 1)
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