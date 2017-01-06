<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable=[
    	'test_id',
    	'test_name',
    	'test_result',
    	'created_at',
    	'updated_at'
    ];
}
