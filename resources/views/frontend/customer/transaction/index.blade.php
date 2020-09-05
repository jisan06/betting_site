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
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-bordered table-striped custom_table">
                            <thead>
                                <tr>
                                    <th width="25px">SL</th>
                                    <th width="100px">Time</th>
                                    <th>For</th>
                                    <th class="text-right">Debit(Out)</th>
                                    <th class="text-right">Credit(In)</th>
                                    <th class="text-right">Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sl = 0;
                                    foreach ($customer_transaction_list as $customer_transaction) {
                                @endphp
                                    <tr>
                                        <td>{{++$sl}}</td>
                                        <td>{{date('d M Y',strtotime($customer_transaction->date_time))}}</td>
                                        <td>{{$customer_transaction->transaction_for}}</td>
                                        <td class="text-right">{{$customer_transaction->debit}}</td>
                                        <td class="text-right">{{$customer_transaction->credit}}</td>
                                        <td class="text-right">{{$customer_transaction->current_balance}}</td>
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