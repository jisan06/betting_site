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
    	Match::whereDate('date_time', Carbon::today())
			->update([
				'live' => 1
			]);

    	$slider_list = Sliders::orderBy('order_by','asc')->where('status',1)->get();

    	$game_list = Game::where('status',1)->get();
    	$match_list = Match::where('status',1)->get();
       	return view('frontend.home.index')->with(compact(
       		'slider_list',
       		'game_list',
       		'match_list'
       	)); 
    }
}
