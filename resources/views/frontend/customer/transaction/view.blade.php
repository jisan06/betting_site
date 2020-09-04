@extends('frontend.customer.index') 

@section('user_breadcrumb')
     <li>
         <a href="{{ route('user.transfer') }}">My Transfer</a>
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
                                <th colspan="6" class="text-center">Transfer Details of ({{date('d M Y',strtotime($customer_transfer_details->created_at))}})</th>
                            </tr>
                        </thead>
                        <tr>
                            <th class="head_name">Transfer Date</th>
                                <td>{{date('d M Y',strtotime($customer_transfer_details->created_at))}}</td>
                            
                            <th class="head_name">Transfer To</th>
                                <td>{{$customer_transfer_details->to_username}}</td>
                            
                        </tr>

                        <tr>
                            <th class="head_name">Transfer Number</th>
                                <td>{{$customer_transfer_details->to_phone_no}}</td>
                            <th class="head_name">Transfer Amount</th>
                                <td>{{$customer_transfer_details->transfer_amount}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection