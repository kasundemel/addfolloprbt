<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Admin;
use App\Template;

class AdminController extends Controller
{
    public function adminlogin(){
    	return view('login');
    }

    public function admincheck(Request $request){
    	//create Admin model object
    	$admin=new Admin();

    	// $username=$request['user_name'];
    	// $userpassword=$request['user_password'];

    	if(isset($request['submit'])){

    		if($admin->user_name == $request['user_name'] && $admin->user_password == $request['user_password']){
    			$temp=Template::all();
        		return view('templateshow',compact('temp'));
    			// return redirect::intend('/template');

    		}
	    	else{
	    		return redirect('/');	
	    	}

    	}
    	
    	
    }
}
