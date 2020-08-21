<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
     protected $fillable = [
    	'name','order_by','status'
    ];
}
