<?php

Route::get('/admin/login', 'AdminController@create') -> name('admin.login');
Route::post('/admin/login', [ 'as'=>'admin.login','uses'=>'AdminController@login']);
Route::post('/admin/logout',[ 'as'=>'admin.logout','uses'=>'AdminController@logout']);

Route::group([
    'prefix' => LaravelLocalization::setLocale() . "/admin",
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    'as' => 'admin.'
], function() {

    // Route::resource('admin', 'AdminController')->middleware('admin:admin');

    Route::resource('pages', 'PagesController');
    Route::get('pages/{pages}/delete', ['as' => 'pages.delete', 'uses' => 'PagesController@destroy']);

    Route::resource('setting', 'SettingController');

    Route::resource('country', 'CountryController');
    Route::get('country/{country}/delete', ['as' => 'country.delete', 'uses' => 'CountryController@destroy']);

    Route::resource('city', 'CityController');
    Route::get('city/{city}/delete', ['as' => 'city.delete', 'uses' => 'CityController@destroy']);

    Route::resource('category', 'CategoryController');
    Route::get('category/{category}/delete', ['as' => 'category.delete', 'uses' => 'CategoryController@destroy']);

    Route::resource('specialization', 'SpecializationController');
    Route::get('specialization/{specialization}/delete', ['as' => 'specialization.delete', 'uses' => 'SpecializationController@destroy']);

    Route::resource('contacts', 'ContactsController');
    Route::get('contacts/{contacts}/delete', ['as' => 'contacts.delete', 'uses' => 'ContactsController@destroy']);

    // Route::resource('about', 'AboutController');
    // Route::get('about/{about}/delete', ['as' => 'about.delete', 'uses' => 'AboutController@destroy']);

    // Route::resource('privacy', 'PrivacyController');
    // Route::get('privacy/{privacy}/delete', ['as' => 'privacy.delete', 'uses' => 'PrivacyController@destroy']);

    Route::resource('plan', 'PlanController');
    Route::get('plan/{plan}/delete', ['as' => 'plan.delete', 'uses' => 'PlanController@destroy']);


    Route::resource('moderator', 'ModeratorController');
    Route::get('moderator/{moderator}/delete',
    ['as' => 'moderator.delete','uses' => 'ModeratorController@destroy']);

    // Auth::routes();

    // ***************************************************************************************************** //

    Route::get('pendding/company/page','SubscriptionController@PenddingCompany');
    Route::get('approved/company/page', 'SubscriptionController@ApprovedCompanyPage');
    Route::get('rejected/company/page', 'SubscriptionController@RejectedCompanyPage');

    Route::get('pendding/request/{id}', ['as' => 'Request.pendding', 'uses' => 'SubscriptionController@PenddingCompany']);

    Route::get('company/approve/{id}', ['as' => 'company.approve', 'uses' => 'SubscriptionController@ApproveCompany']);
    Route::get('company/reject/{id}', ['as' => 'company.approve', 'uses' => 'SubscriptionController@RejectCompany']);
    // ******************************************************************************************************* //

    Route::get('pendding/ads/page','AdsSubscriptionController@PenddingAds');
    Route::get('ads/approve/{id}', ['as' => 'ads.approve', 'uses' => 'AdsSubscriptionController@ApproveAds']);
    Route::get('ads/reject/{id}', ['as' => 'ads.approve', 'uses' => 'AdsSubscriptionController@RejectAds']);
    // Route::get('search/ads', ['as' => 'search.ads', 'uses' => 'AdsSubscriptionController@searchAds']);
    // ********************************************************************************************************* //

    Route::get('pendding/plan/page','SubscriptionController@PenddingPlans')
        -> name('pendding.plan.page');
    Route::get('plans',['as' => 'plans.index', 'uses' => 'SubscriptionController@plans']);
    Route::post('assign/plans',['as' => 'assign.plan', 'uses' => 'SubscriptionController@AssignPlans']);
    Route::get('plan/pendding/{id}', ['as' => 'pendding.plan', 'uses' => 'SubscriptionController@PenddingRequest']);
    Route::get('plan/approve/{id}', ['as' => 'plan.approve', 'uses' => 'SubscriptionController@ApproveCompany']);
    Route::get('plan/reject/{id}', ['as' => 'plan.approve', 'uses' => 'SubscriptionController@RejectCompany']);
    // ************************************************************************************************************//
    Route::get('/statistics', [
        'as' => 'statistics',
        'uses' => 'StatisticsController@index'
    ]);

    Route::get('search',['as'=>'search.result','uses'=>'SubscriptionController@search']);

    Route::get('filter',['as'=>'filter.result','uses'=>'SubscriptionController@filter']);


    Route::get('/partners', 'PartnerController@index')
        -> name('partner.index');
    Route::get('/partners/create', 'PartnerController@create')
        -> name('partner.create');
    Route::get('/companies/partner/{id}/add', 'PartnerController@store')
        -> name('partner.store');
    Route::get('/companies/partner/{id}/remove', 'PartnerController@destroy')
        -> name('partner.remove');

    // ********************************************************************************************************* //


});