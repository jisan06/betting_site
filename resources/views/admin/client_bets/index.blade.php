@extends('admin.layouts.masterIndex')

@section('card_body')
@php
    use App\Game;
    use App\Bett;
    use App\BettingCategory;
    use App\Match;
    use App\Client;
@endphp
<style type="text/css">
    .addBtn{
        display: none;
    }
</style>
    <div class="card-body">

        <div class="table-responsive">
            @php
                $sl = 0;
            @endphp

            <table id="dataTable" class="table table-bordered table-striped"  name="areaTable">
                <thead>
                    <tr>
                        <th width="25px">SL</th>
                        <th>Client Name</th>
                        <th>Phone</th>
                        <th>Game</th>
                        <th>Match</th>
                        <th>Bets</th>
                        <th width="100px" class="text-right">Rate</th>
                        <th width="100px" class="text-right">Amount</th>
                        <th width="100px">status</th>
                        <th width="70px" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="">
                	@php
                        $sl = 0;
                        foreach ($customer_bets_list as $customer_bets) {
                           $client = Client::find($customer_bets->client_id);
                           $bet = Bett::find($customer_bets->betting_id);
                           $betting_category = BettingCategory::find($bet->betting_category_id);
                           $match = Match::find($betting_category->match_id);
                           $game = Game::find($match->game_id);
                    @endphp
                        <tr class="row_{{$customer_bets->id}}">
                            <td>{{++$sl}}</td>
                            <td>{{@$client->name}}</td>
                            <td>{{@$client->phone}}</td>
                            <td>{{$game->name}}</td>
                            <td>{{$match->name}}</td>
                            <td>{{$betting_category->name}} ({{$bet->name}})</td>
                            <td class="text-right">{{$customer_bets->betting_stack}}</td>
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
                            <td class="text-center">
                                @php
                                    echo \App\Link::action($customer_bets->id);
                                @endphp                             
                            </td>
                        </tr>
                    @php
                        }
                    @endphp
                </tbody>
            </table>
        </div>
    </div>	
@endsection
