<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $table = "tbl_payment_method";

    protected $fillable = [
        'name','order_by','status','created_at','updated_at'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
