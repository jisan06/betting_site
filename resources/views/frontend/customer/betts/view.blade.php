@extends('frontend.customer.index') 

@section('user_breadcrumb')
     <li>
         <a href="{{ route('user.betts') }}">My Bets</a>
     </li>
     <li>{{$title}}</li>
@endsection

@section('customer_content')
@php
    use App\Game;
    use App\Bett;
    use App\BettingCategory;
    use App\Match;

        $bet = Bett::find($customer_bets_details->betting_id);
        $betting_category = BettingCategory::find($bet->betting_category_id);
        $match = Match::find($betting_category->match_id);
        $game = Game::find($match->game_id);
@endphp
    <div class="statics-result-map">
        <div class="round-set one">

            <div class="table-responsive">
                <table class="table table-bordered table-sm details_table">
                    <tbody>
                        <thead>
                            <tr style="background: #333;color: #fff;">
                                <th colspan="6" class="text-center">Bet Details ({{$match->name}})</th>
                            </tr>
                        </thead>
                        <tr>
                            <th class="head_name">Game</th>
                            <td>{{$game->name}}</td>
                            <th class="head_name">Match</th>
                            <td>{{$match->name}}</td>
                        </tr>

                        <tr>
                            <th class="head_name">Leauge</th>
                            <td>{{$match->league}}</td>
                            <th class="head_name">Time</th>
                            <td>{{ date('d M Y h:i a',strtotime($match->date_time)) }}</td>
                        </tr>

                        <tr>
                            <th class="head_name">Bets</th>
                            <td>{{$betting_category->name}} ({{$bet->name}})</td>
                            <th class="head_name">Bid Amount</th>
                            <td>{{$customer_bets_details->betting_stack}} * {{$bet->ratio}} (Ratio)</td>
                        </tr>

                         <tr>
                            <th class="head_name">Win/Loss</th>
                            <td>
                                @if($customer_bets_details->winning_status == 0 && $customer_bets_details->winning_status != NULL )
                                    Loss
                                @elseif($customer_bets_details->winning_status == 1 && $customer_bets_details->winning_status != NULL )
                                    Win
                                @else
                                    Pending
                                @endif
                            </td>
                            <th class="head_name">Wining Amount</th>
                            <td>{{$customer_bets_details->wining_amount}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection