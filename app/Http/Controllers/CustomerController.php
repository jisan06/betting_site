<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Client;
use App\Club;

class CustomerController extends Controller
{  
    public function dashboard(){
        $title = "Dashboard";
        return view('frontend.customer.dashboard.index')->with(compact('title'));
    }

    public function profile(){
    	$title = "View Profile";
    	$profile = Client::find(\Auth::guard('customer')->user()->id);
        $club = Club::find($profile->club_id);
    	return view('frontend.customer.profile.index')->with(compact('title','profile','club'));
    }

    public function editProfile(){
    	$title = "Edit Profile";
        $profile = Client::find(\Auth::guard('customer')->user()->id);
        $club_list = Club::where('status',1)->get();
    	if(count(request()->all()) > 0){
            $this->validate(request(), [
                'name' => ['required', 'string', 'max:255'],
                'phone' => ['required','numeric'],
                'email' => ['nullable', 'string', 'email', 'max:255'],
            ]);

            if(request()->password){
                $profile->update([
                    'password' => bcrypt(request()->password),
                ]);
            }

    		$profile->update([
                'name' => request()->name,
                'phone' => request()->phone,
                'email' => request()->email,
                'club_id' => request()->club_id,
            ]);

            return redirect(route('user.customerProfile'))->with('success_message','Your Profile Updated');
    	}
    	return view('frontend.customer.profile.edit')->with(compact('title','profile','club_list'));
    }
}
