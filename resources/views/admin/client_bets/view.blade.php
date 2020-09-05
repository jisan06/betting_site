@extends('admin.layouts.master')

@section('content')
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
    <div class="card"> 
        <div class="custom-card-header">
            <div class="row">
                <div class="col-md-6"><h4 class="custom-card-title">{{ $title }}</h4></div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-outline-info btn-lg" href="{{ route('clientBet.index') }}">
                        <i class="fa fa-arrow-circle-left"></i> Go Back
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-sm">
                <thead class="thead-dark">
                    <tr>
                        <th colspan="6">{{$title }} ({{$match->name}})</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td class="head_name">Client Name</td>
                        <td>{{$client->name}}</td>

                        <td class="head_name">Phone No</td>
                        <td>{{$client->phone}}</td>
                    </tr>

                    <tr>
                        <th class="head_name">Game</th>
                        <td>{{$game->name}}</td>
                        <th class="head_name">Match</th>
                        <td>{{$match->name}}</td>
                    </tr>

                    <tr>
                        <th class="head_name">Team One</th>
                        <td>{{$match->team_one}}</td>
                        <th class="head_name">Team Two</th>
                        <td>{{$match->team_two}}</td>
                    </tr>

                    <tr>
                        <th class="head_name">Leauge</th>
                        <td>{{$match->league}}</td>
                        <th class="head_name">Time</th>
                        <td>{{ date('d M Y H:i a',strtotime($match->date_time)) }}</td>
                    </tr>

                    <tr>
                        <th class="head_name">Bets</th>
                        <td>{{$betting_category->name}} ({{$bet->name}})</td>
                        <th class="head_name">Rate</th>
                        <td>{{$customer_bets_details->betting_stack}}</td>
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
                        <th class="head_name">Amount</th>
                        <td>{{$customer_bets_details->wining_amount}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection