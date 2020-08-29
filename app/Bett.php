<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bett extends Model
{
    protected $table = "tbl_betts";

    protected $fillable = [
        'betting_category_id','name','ratio','result','created_at','updated_at'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}
