<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="MobileOptimized" content="320" />

	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="title" content="{{ @$metaTag['meta_title'] }}">
	<meta name="keywords" content="{{ @$metaTag['meta_keyword'] }}">
	<meta name="description" content="{{ @$metaTag['meta_keyword'] }}" />
	<meta name="author" content="{{@$website_information->website_name}}" />
	<!-- Favicon -->
	<link rel="icon" type="image/icon" href="{{ asset('/').@$website_information->fav_icon }}">

	{{-- website title --}}
	<title>
		{{ @$website_information->website_name }} 
		@if(@$title) {{ @$website_information->prefix_title }} @endif {{ @$title }}
	</title>

	@include('frontend.element.header.header_asset')
</head>

	<body>
		<div class="preloader">
            <img src="{{ asset('public/frontend') }}/assets/img/preloader.gif" alt="">
            <span>{{ @$website_information->website_name }} Loading</span>
        </div>



<!-- bet modal begin -->
<div class="bet-modal-bg ">
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

        <div class="header">
        	@include('frontend.element.header.header_top')
        	@include('frontend.element.header.header_menu')
        </div>

        @yield('content')

        @include('frontend.element.footer.footer_bottom')
        @include('frontend.element.footer.footer_asset')
		@yield('custom_js')
	</body>
</html>