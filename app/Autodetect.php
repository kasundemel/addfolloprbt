<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autodetect extends Model
{
    protected $fillable=[
    	'phone_number',
    	'server',
    	'user_agent',
    	'subscribe',
    	'clicked',
    	'browser',
    	'model_name',
    	'user_ip',
    	'http_referer',
    	'landing_page',
    	'agent_name',
    	'exl',
    	'affID',
    ];
}
