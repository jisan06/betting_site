<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerDeposite extends Model
{
    protected $table = "tbl_client_deposites";

    protected $fillable = [
        'client_id','payment_method_id','deposite_to','deposite_from','transaction_no','deposite_amount','current_balance','status','is_deposited','type'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
