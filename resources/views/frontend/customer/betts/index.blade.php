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

            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-striped custom_table">
                    <thead>
                        <tr>
                            <th width="25px">SL</th>
                            <th width="140px">Game</th>
                            <th class="text-center">Match</th>
                            <th>Bets</th>
                            <th width="90px" class="text-right">Bid Amount</th>
                            <th width="90px" class="text-right">Ratio</th>
                            <th width="120px" class="text-right">Wining Amount</th>
                            <th width="70px">Status</th>
                            <th width="90px" class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $sl = 0;
                            foreach ($customer_bets_list as $customer_bets) {
                               $bet = Bett::find($customer_bets->betting_id);
                               $betting_category = BettingCategory::find($bet->betting_category_id);
                               $match = Match::find($betting_category->match_id);
                               $game = Game::find($match->game_id);
                        @endphp
                            <tr>
                                <td>{{++$sl}}</td>
                                <td>{{$game->name}}</td>
                                <td>{{$match->name}}</td>
                                <td>{{$betting_category->name}} ({{$bet->name}})</td>
                                <td class="text-right">{{$customer_bets->betting_stack}}</td>
                                <td class="text-right">{{$bet->ratio}}</td>
                                <td class="text-right">{{$customer_bets->wining_amount}}</td>
                                <td>
                                    @if($customer_bets->winning_status == 0 && $customer_bets->winning_status != NULL )
                                        Loss
                                    @elseif($customer_bets->winning_status == 1 && $customer_bets->winning_status != NULL )
                                        Win
                                    @else
                                        Pending
                                    @endif
                                </td>
                                <td class="text-right">
                                    <a href="{{ route('user.bettsView',$customer_bets->id) }}" class="text-primary ">
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
@endsection