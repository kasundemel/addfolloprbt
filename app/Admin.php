<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable=[
    	'id',
    	'user_name',
    	'user_password',
    ];
}
