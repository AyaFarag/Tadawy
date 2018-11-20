<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/********************* validate field ********************************************/
Route::post('check/{field}','Auth\LogController@check');
/********************* login ********************************************/
Route::post('login','Auth\LogController@login');

/********************* search ********************************************/
Route::get('search', 'SearchController@search');

/********************** get countries ****************************************/
Route::get('utilities/countries','UtilityController@countries');
/********************** get cities ****************************************/
Route::get('utilities/cities','UtilityController@cities');
/********************** get categories ****************************************/
Route::get('utilities/categories','UtilityController@categories');
/********************** get specializations ****************************************/
Route::get('utilities/specializations','UtilityController@specializations');
/********************** get durations ****************************************/
Route::get('utilities/durations','UtilityController@durations');
/********************** get ads ****************************************/
Route::get('utilities/ads','UtilityController@ads');


/********************** get settings ****************************************/
Route::get('utilities/settings','UtilityController@settings');

/********************** get page ****************************************/
Route::get('utilities/page/{slug}','UtilityController@page');

/********************** get plans ****************************************/
Route::get('utilities/plans','UtilityController@plans');

/********************** get contacts ****************************************/
Route::get('utilities/contacts','UtilityController@contacts');



Route::post('/forget', 'AccountController@sendPasswordResetToken');

Route::group(['middleware'=>['auth:api']],function(){
  Route::post('change-password','Auth\LogController@changePassword');


  /********************* company details *****************************************/
	Route::get('company/{id}', 'CompanyDetailsController@details');
	Route::get('company/{id}/comments', 'CompanyDetailsController@comments');
  Route::get('company/{id}/projects', 'CompanyDetailsController@projects');
	Route::get('company/{id}/data', 'CompanyDetailsController@data');
	/********************* account activation *****************************************/

  Route::get('activate/check', 'AccountController@activated');

	Route::post('activate/phone', 'AccountController@activate');
	Route::post('activate/phone/send', 'AccountController@send');
  Route::get('activate/phone/sent', 'AccountController@sent');

	Route::post('activate/email/send', 'AccountController@sendEmail');
	Route::get('types','UtilityController@CompanyTypes');
});

