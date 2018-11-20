<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function(){
    return view('welcome');
});
Route::get('/activate', 'AccountController@activate') -> name('activate');
Route::get('/password-reset', 'AccountController@showResetPasswordForm')
  -> name('password-reset');
Route::post('/password-reset', 'AccountController@resetPassword')
  -> name('password-reset');

Route::get('/docs', function () {
    ini_set('max_execution_time', 0);
    $cached = \Illuminate\Support\Facades\Cache::get('docs');
    if (empty($cached))
    {
        $doc = new \App\Supports\ApiDoc;
        \Illuminate\Support\Facades\Cache::forever('docs',$doc);
    }else{
        $doc = $cached;
    }
    return view('docs',compact('doc'));
});


// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
