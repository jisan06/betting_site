<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Client;

class CustomerController extends Controller
{  
    public function dashboard(){
        $title = "Dashboard";
        return view('frontend.customer.dashboard')->with(compact('title'));
    }

    public function profile(){
    	$title = "View Profile";
    	$profile = Client::find(\Auth::guard('customer')->user()->id);
    	return view('frontend.customer.profile.index')->with(compact('title','profile'));
    }

    public function editProfile(){
    	$title = "Edit Profile";
    	$profile = Client::find(\Auth::guard('customer')->user()->id);
    	if(count(request()->all()) > 0){
            $this->validate(request(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['nullable', 'string', 'email', 'max:255'],
                'phone' => ['required','numeric'],
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            request()->birth_date = date('Y-m-d',strtotime(request()->birth_date));
            if(request()->image)
            {
                $width = '600';
                $height = '600';
                $image = \App\HelperClass::UploadImage(request()->image,'tbl_clients','public/uploads/profile_image/client/',@$width,@$height);
                $profile->update([
                    'image' => $image,
                ]);
            }

            if(request()->password){
                $profile->update([
                    'password' => request()->password,
                ]);
            }

    		$profile->update([
                'name' => request()->name,
                'phone' => request()->phone,
                'email' => request()->email,
                'address' => request()->address,
                'identification_type' => request()->identification_type,        
                'identification_no' => request()->identification_no,  
                'birth_date' => request()->birth_date,
            ]);

            return redirect(route('user.customerProfile'))->with('message','Your Profile Updated');
    	}
    	return view('frontend.customer.profile.edit')->with(compact('title','profile'));
    }
}
