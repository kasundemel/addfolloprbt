<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider_ip_table extends Model
{
    protected $fillable=[
    	'id',
    	'provider',
    	'ip_range'
    ];
}
