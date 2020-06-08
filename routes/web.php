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

header('Access-Control-Allow-Origin: *');

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/lg2', 'TestController@lg2');

Auth::routes();




Route::get('/mobile/logs', 'AppController@logs');
Route::get('/mobile/markasread/{notification}', 'AppController@markNotificationAsRead');
Route::get('/mobile/markallasread/{notification}', 'AppController@markAllAsRead');
Route::get('/mobile/viewprofile/user', 'AppController@viewProfile');
Route::get('/mobile/notifications/{email}', 'AppController@notifications');

Route::get('/mobile/profile/{email}', 'AppController@profile');
Route::get('/mobile/othersProfile/{email}', 'AppController@othersProfile');
Route::get('/mobile/document/{id}', 'AppController@viewDocument');
Route::get('/mobile/documents/{email}', 'AppController@userDocuments');

Route::post('/mobile/update/profile', 'AppController@updateProfile');


Route::get('/event', 'AppController@event');



Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/deeds', 'DashboardController@deeds');
    Route::get('/registerNew', 'DashboardController@register');
    Route::get('/details', 'DashboardController@details');
    Route::get('/notifications', 'DashboardController@notifications');
    Route::get('/logs', 'DashboardController@logs');
    Route::get('/view/{deed}', 'MainController@view');


    Route::get('/home', 'MainController@index')->name('home');
    Route::get('/create', 'MainController@create')->name('create');
    Route::post('/processCreate', 'MainController@processCreate');

    Route::get('/view/qr_code/{qr_code}', 'MainController@qr_code');
});


Route::post('/app/signup','AppController@signUp');
Route::post('/app/login','AppController@signIn');
Route::post('/app/deeds/fetch','AppController@fetchDeed');

Route::get('/devices','DevicesController@index');
Route::get('/devices/create','DevicesController@create');
Route::post('/devicesaction','DevicesController@storeDevice');


//Route::post('/app/signup','AppController@signUp');

Route::get('/notify','NotificationController@notify');
Route::get('/test','TestController@notify');
