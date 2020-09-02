<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentNumber extends Model
{
    protected $table = "tbl_payment_number";

    protected $fillable = [
        'payment_method_id','number','order_by','status','created_at','updated_at'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
