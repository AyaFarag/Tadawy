<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Companies API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for clients. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('register','RegisterController@register');

Route::group(['middleware'=>['auth:api', 'accountIsActivated']],function(){
	/********************** ads ****************************************/
	Route::resource('ads','AdController')->only('index','store','update','destroy');


	/************************** company meta data***********************************/
	Route::put('company-meta-data', 'CompanyMetaDataController@update');


	/************************** projects ***********************************/
	Route::post('projects', 'ProjectController@store');
	Route::put('projects/{project}', 'ProjectController@update');
	Route::delete('projects/{project}', 'ProjectController@destroy');


	/************************** workdays ***********************************/
	Route::get('workdays', 'WorkDayController@index');
	Route::put('workdays', 'WorkDayController@update');

	/************************** subscription ***********************************/
	Route::post('subscribe', 'SubscriptionController@store');
	
	/************************** reservation ***********************************/
	Route::put('reservation/{reservation}','ReservationController@reservation');
	Route::get('reservation/{reservation}','ReservationController@show');
	Route::get('get-reservations/{status?}','ReservationController@index');

});