<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Agent;
use App\Subagent;
use App\Warehouse;
use App\Marchant;
use App\Client;
use App\BookingOrder;

use Auth;
use Session;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $title = "Web Site CMS Dashboard";
        $userId = Auth::user()->id;
        $userRole = Auth::user()->role;

        if ($userRole == 2 || $userRole == 3)
        {   $title = "Dashboard";
            return view('admin.index.index')->with(compact('title'));
        }
    }
}
