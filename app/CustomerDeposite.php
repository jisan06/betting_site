<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerDeposite extends Model
{
    protected $table = "tbl_client_deposites";

    protected $fillable = [
        'client_id','deposite_from','deposite_to','transaction_no','deposite_amount','status','is_deposited'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
