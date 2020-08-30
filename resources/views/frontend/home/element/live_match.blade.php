@php
    use App\Match;
    use App\BettingCategory;
    use App\Bett;
@endphp
<div class="betting" id="in_play">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-8">
                <div class="section-title">
                    <h2>Live Match</h2>{{-- 
                    <p>PerediOn shows real time odds for betting with the higher stakes you can get. We place your bets in various bMakers to do highest liquidity</p> --}}
                </div>
            </div>
        </div>
        <div class="betting-table">
            <div class="row">
                <div class="col-xl-2 col-lg-2">
                    <div class="bett-menu">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="all-live-sports-tab" data-toggle="tab" href="#all-live-sports" role="tab" aria-controls="all-live-sports" aria-selected="true">
                                    <i class="flaticon-medal"></i>
                                    <span class="text">
                                        all sports
                                    </span> 
                                </a>
                            </li>
                            @foreach ($game_list as $game)
                                <li class="nav-item">
                                    <a class="nav-link" id="live_match_{{$game->id}}" data-toggle="tab" href="#live-match-{{$game->id}}" role="tab" aria-controls="football" aria-selected="false">
                                        <i class="flaticon-cricket"></i>
                                        <span class="text">
                                            {{$game->name}}
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-10">
                    <div class="tab-content bet-tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="all-live-sports" role="tabpanel" aria-labelledby="all-live-sports-tab">
                            <div class="sport-content-title">
                                <h3>All Sports 
                                    <span class="sport-content-conter">[{{count($match_list)}}]</span>
                                </h3>
                            </div>
                            @php
                                foreach ($match_list as $match) {
                                    $betting_category_list = BettingCategory::where('match_id',$match->id)
                                        ->where('status',1)
                                        ->get();
                            @endphp
                                <div class="sports-list">
                                    <h4 class="title">
                                        {{$match->team_one}} VS {{$match->team_two}}
                                        <br>
                                        <span class="leauge_name">{{$match->league}}</span> ||
                                        <span class="duration">{{ date('d M Y H:i a',strtotime($match->date_time)) }}</span> 
                                    </h4>
                                    @php
                                        foreach ($betting_category_list as $betting_category) {
                                            $betting_list = Bett::where('betting_category_id',$betting_category->id)
                                                ->get();
                                                if(count($betting_list) > 0){
                                    @endphp
                                        <div class="single-sport-box">
                                            {{-- <div class="part-icon">
                                                <i class="flaticon-football"></i>
                                            </div> --}}
                                            <div class="part-team">
                                                <ul>
                                                    <li>
                                                        <span class="match_name" style="display: none;">
                                                            {{$match->team_one}} VS {{$match->team_two}}
                                                        </span>

                                                        <span class="match_leauge" style="display: none;">
                                                            <span class="leauge_name">{{$match->league}}</span> ||
                                                            <span class="duration">{{ date('d M Y H:i a',strtotime($match->date_time)) }}</span> 
                                                        </span>

                                                        <span class="team-name betting_category">
                                                            {{$betting_category->name}}
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                            @php
                                                foreach ($betting_list as $betting) {
                                            @endphp
                                                <div class="part-match">
                                                    <div class="single-place-to-bet">
                                                        <a href="javascript:void(0)">
                                                            <span style="display: none;" class="betting_id">{{$betting->id}}</span>
                                                            <span class="bet-price">{{$betting->ratio}}</span>
                                                            <span class="result-for-final">
                                                                {{$betting->name}}
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            @php
                                                }
                                            @endphp
                                            <div class="part-bnonus">
                                                <span class="bonus-number">+336</span>
                                            </div>
                                        </div>
                                    @php
                                        } }
                                    @endphp
                                </div>
                            @php
                                }
                            @endphp
                        </div>
                        @foreach ($game_list as $game)
                        @php
                            $betting_category_list = Match::where('game_id',$game->id)->where('status',1)->get()
                        @endphp
                            <div class="tab-pane fade" id="live-match-{{$game->id}}" role="tabpanel" aria-labelledby="tennis-tab">
                                <div class="sport-content-title">
                                    <h3>{{$game->name}}
                                        <span class="sport-content-conter">[{{count($betting_category_list)}}]</span>
                                    </h3>
                                </div>
                                @php
                                    foreach ($betting_category_list as $betting) {
                                @endphp
                                    <div class="sports-list">
                                        <h4 class="title">{{$betting->name}}</h4>
                                        <div class="single-sport-box">
                                            <div class="part-icon">
                                                <i class="flaticon-tennis-ball"></i>
                                            </div>
                                            <div class="part-team">
                                                <ul>
                                                    <li>
                                                        <span class="team-name">
                                                            Kenny Schepper
                                                        </span>
                                                        <span class="score-number">
                                                            3
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="team-name">
                                                            Quentin Robert
                                                        </span>
                                                        <span class="score-number">
                                                            6
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="part-match">
                                                <div class="single-place-to-bet">
                                                    <a href="#">
                                                        <span class="bet-price">3.25</span>
                                                        <span class="result-for-final">
                                                            Kenny Schepper
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="single-place-to-bet">
                                                    <a href="#">
                                                        <span class="bet-price">2.62</span>
                                                        <span class="result-for-final">
                                                            draw
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="single-place-to-bet">
                                                    <a href="#">
                                                        <span class="bet-price">1.44</span>
                                                        <span class="result-for-final">
                                                            Quentin Robert
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="part-bnonus">
                                                <span class="bonus-number">+336</span>
                                            </div>
                                        </div>
                                        <div class="single-sport-box">
                                            <div class="part-icon">
                                                <i class="flaticon-tennis-ball"></i>
                                            </div>
                                            <div class="part-team">
                                                <ul>
                                                    <li>
                                                        <span class="team-name">
                                                            Christian Langmo
                                                        </span>
                                                        <span class="score-number">
                                                            5
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="team-name">
                                                            Manuel Pena Lopez
                                                        </span>
                                                        <span class="score-number">
                                                            2
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="part-match">
                                                <div class="single-place-to-bet">
                                                    <a href="#">
                                                        <span class="bet-price">1.70</span>
                                                        <span class="result-for-final">
                                                            Christian Langmo
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="single-place-to-bet">
                                                    <a href="#">
                                                        <span class="bet-price">2.30</span>
                                                        <span class="result-for-final">
                                                            draw
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="single-place-to-bet">
                                                    <a href="#">
                                                        <span class="bet-price">2.05</span>
                                                        <span class="result-for-final">
                                                            Manuel Pena Lopez
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="part-bnonus">
                                                <span class="bonus-number">+336</span>
                                            </div>
                                        </div>
                                        <div class="single-sport-box">
                                            <div class="part-icon">
                                                <i class="flaticon-tennis-ball"></i>
                                            </div>
                                            <div class="part-team">
                                                <ul>
                                                    <li>
                                                        <span class="team-name">
                                                            Stade Bordelais
                                                        </span>
                                                        <span class="score-number">
                                                            3
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="team-name">
                                                            Nantes II
                                                        </span>
                                                        <span class="score-number">
                                                            3
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="part-match">
                                                <div class="single-place-to-bet">
                                                    <a href="#">
                                                        <span class="bet-price">3.22</span>
                                                        <span class="result-for-final">
                                                            Stade Bordelais
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="single-place-to-bet">
                                                    <a href="#">
                                                        <span class="bet-price">4.00</span>
                                                        <span class="result-for-final">
                                                            draw
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="single-place-to-bet">
                                                    <a href="#">
                                                        <span class="bet-price">2.45</span>
                                                        <span class="result-for-final">
                                                            Nantes II
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="part-bnonus">
                                                <span class="bonus-number">+336</span>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        }
                                    @endphp
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('betting_modal')
    <div class="bet-modal-bg ">
        <div class="bet-modal">
            <div class="bet-header">
                <span class="title">Place Bet</span>
                <button class="cls-btn"><i class="fas fa-times"></i></button>
            </div>
            <div class="bet-body">
                <div class="betting_modal_match">
                    <input type="hidden" class="bet_modal_betting_id" name="bet_modal_betting_id" value="">
                    <h6>
                        <span class="bet_modal_match_name"></span>
                        <br>
                        <span class="bet_modal_match_leauge">
                            
                        </span>
                         
                    </h6>

                    <span class="bet_modal_bet_category"></span>

                    <div class="place-of-bet">
                        <span class="place-of-bet-title"></span>
                        <input class="place-of-bet-number" type="number" value="1" readonly>
                    </div>
                </div>

                <div class="ctrl-buttons">
                    <div class="butto-shadow">
                        <button class="ctrl-button-for-number minus-number">-</button>
                        <input type="number" value="1" min="1" class="number-of-stake" placeholder="stake" oninput="bettAmountFunction()">
                        <button class="ctrl-button-for-number plus-number">+</button>
                    </div>
                </div>

                <div class="bet-total">
                    <ul>
                        <li>
                            <span class="number-of-stake-title">stake :</span>
                            <input class="number-of-stake-count" type="number" value="100" readonly>
                        </li>
                        <li>
                            <span class="number-of-bet">Possible Winning Amount :</span>
                            <span class="number-of-bet-count">82</span>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="bet-footer">
                @if(Auth::guard('customer')->user())
                    <button class="btn btn-primary">Place Bet</button>
                @else
                    <a href="{{ route('user.login') }}" style="color: red;font-weight: bold;">Click for Login</a>
                @endif
                
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
    <script type="text/javascript">
        function bettAmountFunction(){
            var odds = $('.bet-modal').find('.number-of-stake').val();
            $('.bet-modal').find('.number-of-stake-count').val(odds);
            $('.altv-3').html(odds);

            var betNumber = $('.bet-modal').find('.place-of-bet-number').val();
            var stakeCount = $('.bet-modal').find('.number-of-stake-count').val();
            var betTotal = betNumber * stakeCount;
            var n = betTotal.toFixed(2);
            $('.bet-modal').find('.number-of-bet-count').html(n);
        }
    </script>
@endsection
