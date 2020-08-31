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
                                    <span class="sport-content-conter">[{{count($live_match_list)}}]</span>
                                </h3>
                            </div>
                            @php
                                foreach ($live_match_list as $match) {
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
                                                $count_betting = 0;
                                                foreach ($betting_list as $betting) {
                                                    $get_count_betting = CustomerBett::where('betting_id',@$betting->id)->count();
                                                    $count_betting = $count_betting + $get_count_betting;


                                                    $exist_betting_check = CustomerBett::where('client_id',@Auth::guard('customer')->user()->id)->where('betting_id',@$betting->id)->first();
                                                    if(@$exist_betting_check && @Auth::guard('customer')->user()){
                                                        $disabled = "disabled";
                                                    }else{
                                                        $disabled = '';
                                                    }
                                            @endphp
                                                <div class="part-match">
                                                    <div class="single-place-to-bet">
                                                        <a href="javascript:void(0)" class="{{$disabled}} single_bett_{{$betting->id}}">
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
                            $live_match_list = Match::where('game_id',$game->id)
                                                ->where('live',1)
                                                ->where('status',1)
                                                ->get()
                        @endphp
                            <div class="tab-pane fade" id="live-match-{{$game->id}}" role="tabpanel" aria-labelledby="tennis-tab">
                                <div class="sport-content-title">
                                    <h3>{{$game->name}}
                                        <span class="sport-content-conter">[{{count($live_match_list)}}]</span>
                                    </h3>
                                </div>
                                @php
                                    foreach ($live_match_list as $match) {
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
                                                    $count_betting = 0;
                                                    foreach ($betting_list as $betting) {
                                                        $get_count_betting = CustomerBett::where('betting_id',@$betting->id)->count();
                                                        $count_betting = $count_betting + $get_count_betting;

                                                        $exist_betting_check = CustomerBett::where('client_id',@Auth::guard('customer')->user()->id)->where('betting_id',@$betting->id)->first();
                                                        if(@$exist_betting_check && @Auth::guard('customer')->user()){
                                                            $disabled = "disabled";
                                                        }else{
                                                            $disabled = '';
                                                        }
                                                @endphp
                                                    <div class="part-match">
                                                        <div class="single-place-to-bet">
                                                            <a href="javascript:void(0)" class="{{$disabled}} single_bett_{{$betting->id}}">
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
                        <input type="number" value="100" min="1" class="number-of-stake" placeholder="stake" oninput="bettAmountFunction()">
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
                    <button class="btn btn-primary" id="submit_bet">Place Bet</button>
                @else
                    <a href="{{ route('user.login') }}" style="color: red;font-weight: bold;">Click for Login</a>
                @endif
                
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
    <script type="text/javascript">
        $('#submit_bet').click(function(){
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            var betting_id = $('.bet_modal_betting_id').val();
            var betting_stack = $('.altv-3').text();
            var wining_amount = $('.number-of-bet-count').text();

            Swal.fire({  
                title: "Are you sure?",   
                text: "If you want to bett, click yes button",     
                showCancelButton: true,   
                confirmButtonColor: "#DD6B55",   
                confirmButtonText: "Yes",   
                cancelButtonText: "No",
            }).then(function(isConfirm) {  
                    if (isConfirm) {
                        $.ajax({
                            type: "POST",
                            url : "{{ route('user.saveBett') }}",
                            data : 
                                {
                                    betting_id:betting_id,
                                    betting_stack:betting_stack,
                                    wining_amount:wining_amount,
                                },
                            success: function(response) {
                                Swal.fire({  
                                    title: "<small class='text-success'>Success!</small>", 
                                    type: "success",
                                    text: "Your bett saved",
                                    timer: 3000,
                                });

                                $('.single_bett_'+betting_id).addClass('disabled');
                                closeModal();
                            },
                            error: function(response) {
                                error = "Failed.";
                                errorMessage = Object.entries(response.responseJSON.errors);
                                Swal.fire({ 
                                    title: "<p class='text-danger' style='line-height:30px;font-size:20px;'>Error !  "+errorMessage[0][1]+"</p>",
                                    type: "error",
                                    timer: 4000,
                                });
                            }
                        });    
                    } 
                });
        });
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

        function closeModal(){
            $('.bet-modal-bg').removeClass('show');
            $('.bet-modal').removeClass('open');
            $('body').css('padding-right', '0');
            $('.number-of-stake').val(1); 
            $('.number-of-stake-count').val(1);
            $('.altv-1').remove();
            $('.altv-2').remove();
            $('.altv-3').remove();
            $('.bet-modal-bg').removeClass('show');

            var html = jQuery('html');
            var scrollPosition = html.data('scroll-position');
            html.css('overflow', html.data('previous-overflow'));
            window.scrollTo(scrollPosition[0], scrollPosition[1]);
        }
    </script>
@endsection
