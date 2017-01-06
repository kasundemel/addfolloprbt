<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


Route::get('template', function () {
    return view('templateupload');
});

Route::get('templateshow','TemplateController@template');
Route::post('templateshow','TemplateController@template');

Route::get('drop',function(){
	return view('drop');
});

// Route::get('/','AdminController@adminlogin');

Route::post('adminchk','AdminController@admincheck');
Route::get('adminchk','AdminController@admincheck');


Route::get('addcampaign','TemplateController@templateshow');
Route::post('addcampaign','TemplateController@templateshow');

Route::get('delete/{tmp_id}','TemplateController@templatedelete');

Route::get('dropdown','TemplateController@dropdownview');

Route::get('campaign','CampaignController@addcampaign');
Route::post('campaign','CampaignController@addcampaign');

Route::get('viewcamp','CampaignController@view_campaign');
Route::post('viewcamp','CampaignController@view_campaign');

Route::get('templates','TemplateController@viewtemplate');
Route::post('templates','TemplateController@viewtemplate');

Route::get('autodetect','CampaignController@auto_detect_data');
Route::post('autodetect','CampaignController@auto_detect_data');

//create_click_log
Route::get('createclicklogs','CreateClickLogsController@create_click_log');
Route::post('createclicklogs','CreateClickLogsController@create_click_log');

Route::get('camp/{camp_name}/{tmp_name}','CampaignController@showcampaign');

Route::auth();

Route::get('/', 'HomeController@index');

