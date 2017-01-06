<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secure_bill_data extends Model
{
	protected $fillable=[
		'id',
    	'click_id',
    	'response',
    	'created_time'
	];
    
}
