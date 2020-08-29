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
                                        {{$match->name}}
                                        <br>
                                        <span class="leauge_name">{{$match->league}}</span> ||
                                        <span class="duration">{{ date('d M Y H:i a',strtotime($match->date_time)) }}</span> 
                                    </h4>
                                    @php
                                        foreach ($betting_category_list as $betting_category) {
                                            $betting_list = Bett::where('betting_category_id',$betting_category->id)
                                                ->get();
                                    @endphp
                                        <div class="single-sport-box">
                                            {{-- <div class="part-icon">
                                                <i class="flaticon-football"></i>
                                            </div> --}}
                                            <div class="part-team">
                                                <ul>
                                                    <li>
                                                        <span class="team-name">
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
                                                        <a href="#">
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
                                        }
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

<!-- bet modal begin -->
<div class="bet-modal-bg">
    <div class="bet-modal">
        <div class="bet-header">
            <span class="title">Predict a game</span>
            <button class="cls-btn"><i class="fas fa-times"></i></button>
        </div>
        <div class="bet-body">
            <div class="place-of-bet">
                <span class="place-of-bet-title">real madrid</span>
                <input class="place-of-bet-number" type="number" value="1" readonly>
            </div>
            <div class="bet-descr">
                <span class="team-name team-name-1st">america</span>
                <span class="img-ic"><img src="assets/img/vs-icon.png" alt=""></span>
                <span class="team-name team-name-2nd">iran</span>
                <div class="team-score">[<span class="team-first-score">1</span>:<span class="team-second-score">1</span>] 1X2 Live Prediction</div>
            </div>
            <div class="ctrl-buttons">
                <div class="butto-shadow">
                    <button class="ctrl-button-for-number minus-number">-</button>
                    <input type="number" value="1" max="99" min="1" class="number-of-stake" placeholder="stake">
                    <button class="ctrl-button-for-number plus-number">+</button>
                </div>
            </div>
            <div class="bet-total">
                <ul>
                    <li>
                        <span class="number-of-stake-title">stake :</span>
                        <input class="number-of-stake-count" type="number" value="1" readonly>
                    </li>
                    <li>
                        <span class="number-of-bet">Total Est. Returns :</span>
                        <span class="number-of-bet-count">82</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="bet-footer">
            <button>Predict Now</button>
        </div>
    </div>
</div>
<!-- bet modal end -->
