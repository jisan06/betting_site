<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = "tbl_games";

    protected $fillable = [
        'name','icon','order_by','status','created_at','updated_at'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
