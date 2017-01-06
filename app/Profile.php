<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable=[
    	'p_id',
    	'p_name',
    	'p_url',
    	'created_at',
    	'updated_at'
    ];
}
