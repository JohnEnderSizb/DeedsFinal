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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/home', 'MainController@index')->name('home');
    Route::get('/create', 'MainController@create')->name('create');
    Route::post('/processCreate', 'MainController@processCreate');

    Route::get('/view/{deed}', 'MainController@view');
    Route::get('/view/qr_code/{qr_code}', 'MainController@qr_code');
});


Route::post('/app/signup','AppController@signUp');
Route::post('/app/login','AppController@signIn');
Route::post('/app/deeds/fetch','AppController@fetchDeed');

Route::get('/devices','DevicesController@index');
Route::get('/devices/create','DevicesController@create');
Route::post('/devicesaction','DevicesController@storeDevice');


//Route::post('/app/signup','AppController@signUp');
