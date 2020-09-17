@php
    use App\Match;
    use App\BettingCategory;
    use App\Bett;
    use App\CustomerBett;
@endphp
<div class="betting" id="in_play">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-8">
                <div class="section-title">
                    <h2>Upcoming Match</h2>{{-- 
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
                                <a class="nav-link active" id="all-upcoming-sports-tab" data-toggle="tab" href="#all-upcoming-sports" role="tab" aria-controls="all-upcoming-sports" aria-selected="true">
                                    <i class="flaticon-medal"></i>
                                    <span class="text">
                                        all sports
                                    </span> 
                                </a>
                            </li>
                            @foreach ($game_list as $game)
                                <li class="nav-item">
                                    <a class="nav-link" id="live_match_{{$game->id}}" data-toggle="tab" href="#upcoming-match-{{$game->id}}" role="tab" aria-controls="football" aria-selected="false">
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
                        <div class="tab-pane fade show active" id="all-upcoming-sports" role="tabpanel" aria-labelledby="all-upcoming-sports-tab">
                            <div class="sport-content-title">
                                <h3>All Sports 
                                    <span class="sport-content-conter">[{{count($upcomming_match_list)}}]</span>
                                </h3>
                            </div>
                            @php
                                foreach ($upcomming_match_list as $match) {
                                    $betting_category_list = BettingCategory::where('match_id',$match->id)
                                        ->where('status',1)
                                        ->get();
                            @endphp
                                <div class="sports-list">
                                    <h4 class="title">
                                        {{$match->team_one}} VS {{$match->team_two}}
                                        <br>
                                        <span class="leauge_name">{{$match->league}}</span> ||
                                        <span class="duration">{{ date('d M Y h:i a',strtotime($match->date_time)) }}</span> 
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
                                                            <span class="duration">{{ date('d M Y h:i a',strtotime($match->date_time)) }}</span> 
                                                        </span>

                                                        <span class="team-name betting_category">
                                                            {{$betting_category->name}}
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                                <div class="part-match">
                                                    @php
                                                        $count_betting = 0;
                                                        foreach ($betting_list as $betting) {
                                                            $get_count_betting = CustomerBett::where('betting_id',@$betting->id)->count();
                                                            $count_betting = $count_betting + $get_count_betting;


                                                            $exist_betting_check = CustomerBett::where('client_id',@Auth::guard('customer')->user()->id)->where('betting_id',@$betting->id)->first();
                                                            if(@$exist_betting_check && @Auth::guard('customer')->user()){
                                                                $disabled = "";
                                                            }else{
                                                                $disabled = '';
                                                            }
                                                    @endphp
                                                    <div class="single-place-to-bet">
                                                        <a href="javascript:void(0)" class="{{$disabled}} single_bett_{{$betting->id}}">
                                                            <span style="display: none;" class="betting_id">{{$betting->id}}</span>
                                                            <span class="bet-price">{{$betting->ratio}}</span>
                                                            <span class="result-for-final">
                                                                {{$betting->name}}
                                                            </span>
                                                        </a>
                                                    </div>
                                                    @php
                                                        }
                                                    @endphp
                                                </div>
                                            <div class="part-bnonus">
                                                <span class="bonus-number">+{{$count_betting}}</span>
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
                            $upcomming_match_list = Match::where('game_id',$game->id)
                                                ->where('live',0)
                                                ->where('status',1)
                                                ->get()
                        @endphp
                            <div class="tab-pane fade" id="upcoming-match-{{$game->id}}" role="tabpanel" aria-labelledby="tennis-tab">
                                <div class="sport-content-title">
                                    <h3>{{$game->name}}
                                        <span class="sport-content-conter">[{{count($upcomming_match_list)}}]</span>
                                    </h3>
                                </div>
                                @php
                                    foreach ($upcomming_match_list as $match) {
                                        $betting_category_list = BettingCategory::where('match_id',$match->id)
                                            ->where('status',1)
                                            ->get();
                                @endphp
                                    <div class="sports-list">
                                        <h4 class="title">
                                            {{$match->team_one}} VS {{$match->team_two}}
                                            <br>
                                            <span class="leauge_name">{{$match->league}}</span> ||
                                            <span class="duration">{{ date('d M Y h:i a',strtotime($match->date_time)) }}</span> 
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
                                                                <span class="duration">{{ date('d M Y h:i a',strtotime($match->date_time)) }}</span> 
                                                            </span>

                                                            <span class="team-name betting_category">
                                                                {{$betting_category->name}}
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                    <div class="part-match">
                                                        @php
                                                            $count_betting = 0;
                                                            foreach ($betting_list as $betting) {
                                                                $get_count_betting = CustomerBett::where('betting_id',@$betting->id)->count();
                                                                $count_betting = $count_betting + $get_count_betting;

                                                                $exist_betting_check = CustomerBett::where('client_id',@Auth::guard('customer')->user()->id)->where('betting_id',@$betting->id)->first();
                                                                if(@$exist_betting_check && @Auth::guard('customer')->user()){
                                                                    $disabled = "";
                                                                }else{
                                                                    $disabled = '';
                                                                }
                                                        @endphp
                                                            <div class="single-place-to-bet">
                                                                <a href="javascript:void(0)" class="{{$disabled}} single_bett_{{$betting->id}}">
                                                                    <span style="display: none;" class="betting_id">{{$betting->id}}</span>
                                                                    <span class="bet-price">{{$betting->ratio}}</span>
                                                                    <span class="result-for-final">
                                                                        {{$betting->name}}
                                                                    </span>
                                                                </a>
                                                            </div>

                                                        @php
                                                            }
                                                        @endphp
                                                    </div>
                                                <div class="part-bnonus">
                                                    <span class="bonus-number">+{{$count_betting}}</span>
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
