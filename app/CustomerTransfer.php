<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerTransfer extends Model
{
    protected $table = "tbl_client_transfer";

    protected $fillable = [
        'client_id','name','phone_no','to_username','to_phone_no','transfer_amount'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
