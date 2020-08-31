<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable
{	use Notifiable;
	protected $table = "tbl_clients";

    protected $fillable = [
    	'user_role_id','club_id','name','username','sponsor_username','phone','email','identification_type','identification_no','address','birth_date','image','balance','password','verification_code','token','status','created_by','updated_by'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
