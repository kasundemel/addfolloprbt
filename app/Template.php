<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $fillable=[
    	'tmp_id',
    	'tmp_name',
    	'tmp_url',
    	'created_at'
    ];
}
