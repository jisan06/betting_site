<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sliders;
use App\Match;
use Carbon\Carbon;
use App\Game;

class FrontendController extends Controller
{	
    public function index()
    {	
    	$slider = Sliders::where('status',1)->first();

    	$game_list = Game::where('status',1)->get();
      $live_match_list = Match::where('status',1)->where('live',1)->get();
    	$upcomming_match_list = Match::where('status',1)->where('live',0)->get();
       	return view('frontend.home.index')->with(compact(
       		'slider',
       		'game_list',
          'live_match_list',
       		'upcomming_match_list',
       	)); 
    }
}
