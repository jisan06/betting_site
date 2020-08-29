<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $table = "tbl_matches";

    protected $fillable = [
        'game_id','name','team_one','team_two','league','date-time','icon','order_by','status','live','created_at','updated_at'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
