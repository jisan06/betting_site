<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerWithdraw extends Model
{
    protected $table = "tbl_client_withdraw";

    protected $fillable = [
        'client_id','name','phone_no','payment_method_id','payment_type','withdraw_amount','withdraw_number','current_balance','status','is_withdrawed','type'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
