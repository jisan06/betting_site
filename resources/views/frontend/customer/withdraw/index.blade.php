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
@endphp
    <div class="statics-result-map">
        <div class="round-set one">
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6 text-right">
                    <a style="font-size: 16px;" class="btn btn-info" href="{{ route('user.withdrawRequest') }}">
                        <i class="fa fa-plus-circle"></i> Request Withdraw
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
                                    <th>To</th>
                                    <th>payment Type</th>
                                    <th width="150px" class="text-right">Amount</th>
                                    <th width="150px" class="text-center">Status</th>
                                    <th width="100px" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sl = 0;
                                    foreach ($customer_withdraw_list as $customer_withdraw) {
                                @endphp
                                    <tr>
                                        <td>{{++$sl}}</td>
                                        <td>{{date('d M Y',strtotime($customer_withdraw->created_at))}}</td>
                                        <td>{{$customer_withdraw->withdraw_number}}</td>
                                        <td>{{$customer_withdraw->payment_type}}</td>
                                        <td class="text-right">{{$customer_withdraw->withdraw_amount}}</td>
                                        <td class="text-center">
                                            @if($customer_withdraw->status == 0)
                                                Pending
                                            @endif

                                            @if($customer_withdraw->status == 1)
                                                Withdrawed
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('user.withdrawview',$customer_withdraw->id) }}" class="text-primary ">
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