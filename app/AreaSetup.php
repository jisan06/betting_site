<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaSetup extends Model
{
	protected $table = "tbl_area";

    protected $fillable = [
    	'name','charge','root_plan','description','status','order_by','status','created_by','updated_by'
    ];

	protected $hidden = [
		'created_at','updated_at'
	];
}