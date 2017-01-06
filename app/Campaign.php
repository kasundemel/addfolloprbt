<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable=[
    	'campaign_id',
    	'campaign_name',
    	'campaign_template',
    	'fial_url',
    	'success_url',
    	'parameter',
    	'mobile_select_page',
    	'other_url',
    	'urls',
        'campaign_category',
    	'created_at',
    	'updated_at',
        'campaign_url'
    ];
}
