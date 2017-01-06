<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Click_log extends Model
{
    protected $fillable=[
    	'id',
    	'server',
    	'landing_page',
    	'agent_name',
    	'user_ip',
    	'HTTP_referer',
    	'phone_number',
    	'user_agent',
    	'browser',
    	'model_name',
    	'source',
    	'subscribe',
    	'click_id',
    	'created_date',
    	'affID'
    ];
}
