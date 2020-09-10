<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Club;
use App\Client;

class ClubUserController extends Controller
{
    public function index(){
        $club = Club::find(\Auth::guard('customer')->user()->club_owner_id);
        $title = "My Club User ( ".$club->name." )";
        $client_list = Client::
                        where('club_id',\Auth::guard('customer')->user()->club_owner_id)
                        ->where('club_owner_id',NULL)
                        ->orderBy('id','desc')
                        ->get();
        return view('frontend.customer.club-user.index')->with(compact('title','client_list'));
    }

    public function view($id){
        $title = "Club User Details";
        $client = Client::find($id);
        return view('frontend.customer.club-user.view')->with(compact('title','client'));
    }
    
}