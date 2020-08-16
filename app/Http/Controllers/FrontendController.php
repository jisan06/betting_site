<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sliders;

class FrontendController extends Controller
{	
    public function index()
    {	
    	$slider_list = Sliders::orderBy('order_by','asc')->where('status',1)->get();
       return view('frontend.home.index')->with(compact('slider_list')); 
    }
}
