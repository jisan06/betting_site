<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

use App\Client;
use App\Club;
use App\WebsiteInformation;

class CustomerAuthController extends Controller
{   public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
    }

    public function registration(Request $request){
        $title = 'Create User Account';
        $club_list = Club::where('status',1)->get();
        if(count($request->all()) > 0){
            $this->validate(request(), [
                'name' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'max:255','unique:tbl_clients'],
                'phone' => ['required','numeric', 'unique:tbl_clients'],
                'email' => ['nullable', 'string', 'email', 'max:255', 'unique:tbl_clients'],
                'password' => ['required', 'string', 'min:6', 'same:confirm_password'],
                'confirm_password' => ['required', 'string', 'min:6'],
            ],
            [   
                'phone.unique'=>'The mobile no already exist ! give new mobile no',
                'password.same'=>'Password and Confirm Password Not Matched',
            ]);
                
            $user = Client::create([
                'name' => $request->name,
                'username' => $request->username,
                'sponsor_username' => $request->sponsor_username,
                'phone' => $request->phone,     
                'email' => $request->email,     
                'club_id' => $request->club_id,     
                'password' => bcrypt($request->password),
                'status'=>'1'
            ]);

            if(@$user){
                if(Auth::guard('customer')->attempt(['username'=> request()->username, 'password'=> request()->password])){
                    return redirect()->intended(url('/'))->with('success_registration','Your registration successfull');
                }

            }
        }
       return view('frontend.customer.auth.registration')->with(compact('title','club_list')); 
    }

    public function login(){
        $title = 'Login Your Account';

        if(count(request()->all()) > 0){
            $customer = Client::where('username',request()->username)->first();
            if(@$customer && $customer->status == 0){
                return redirect(route('user.login'))->withErrors([
                    'error' => 'You are not active member',
                ])->withInput();
            }elseif(Auth::guard('customer')->attempt(['username' => request()->username, 'password'=> request()->password]))
            {
                return redirect()->intended(url('/'))->with('success_login','Your are now logged in');
            }else{
                return redirect(route('user.login'))->withErrors([
                    'error' => 'user name or password not matched.',
                ])->withInput();
            }
        }

        return view('frontend.customer.auth.login')->with(compact('title'));
    }

    public function verifyEmailBodyTemplate($name,$verification_link){
        $website_information = WebsiteInformation::where('id',1)->first();
        $message_body = 
            '
                <html>
                    <head>
                        <title>Email Verification</title>
                    </head>
                    <body>
                        <div>
                            <table border="0" cellpadding="0" cellspacing="0" style="margin: 0 auto; background-color: #fff; border: 1px solid #ddd;">
                                <tbody>
                                    <tr>
                                        <td>
                                            <table border="0" cellpadding="0" cellspacing="0" width="650">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div style="padding: 20px;">
                                                                <h3><b>Dear '.$name.'</b></h3>
                                                                <p>
                                                                    Thank you for your registration. You are now registered member.
                                                                </p>
                                                                
                                                                '.
                                                                /*<div style="text-align: center;margin-top: 30px;text-transform: uppercase;">
                                                                    <a href="'.$verification_link.'" style="text-decoration: none;background: #0f887c;color: #fff;padding: 10px;">Click here to verify</a>
                                                                </div>*/
                                                                '
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="background-color: #0e4168;" height="40">
                                            <p style="padding: 0; margin: 0; color: #fff; font-size: 15px; line-height: 22px; font-weight: 700; text-align: center;">'.$website_information->website_name.'</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </body>
                </html>
            ';

            return $message_body;
    }

    public function logout()
    {
        Auth::logout('customer');

        return redirect(url('/'));
    }
}
