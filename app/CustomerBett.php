<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerBett extends Model
{
    protected $table = "tbl_client_betts";

    protected $fillable = [
        'client_id','betting_id','betting_stack','wining_amount','winning_status'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
