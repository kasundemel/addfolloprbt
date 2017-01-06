<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider_sms_data extends Model
{
    protected $fillable=[
    	'id',
    	'provider',
    	'sms_number',
    	'sms_data',
    	'redirect_url'
    ];
}
