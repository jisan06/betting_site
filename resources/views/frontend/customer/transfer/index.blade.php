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
                    <a style="font-size: 16px;" class="btn btn-info" href="{{ route('user.transferRequest') }}">
                        <i class="fa fa-plus-circle"></i> Request Transfer
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
                                    <th>To User</th>
                                    <th>Phone Number</th>
                                    <th width="150px" class="text-right">Amount</th>
                                    <th width="100px" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sl = 0;
                                    foreach ($customer_transfer_list as $customer_transfer) {
                                @endphp
                                    <tr>
                                        <td>{{++$sl}}</td>
                                        <td>{{date('d M Y',strtotime($customer_transfer->created_at))}}</td>
                                        <td>{{$customer_transfer->to_username}}</td>
                                        <td>{{$customer_transfer->to_phone_no}}</td>
                                        <td class="text-right">{{$customer_transfer->transfer_amount}}</td>
                                        <td class="text-right">
                                            <a href="{{ route('user.transferview',$customer_transfer->id) }}" class="text-primary ">
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