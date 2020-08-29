<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BettingCategory extends Model
{
    protected $table = "tbl_betting_categories";

    protected $fillable = [
        'match_id','name','order_by','status','created_at','updated_at'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
