<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return 'Home Page 1';
//});

// telr
Route::get('handle-payment/{status}', 'API\TelrController@response');


Route::get('/', function () {
    return view('welcome');
});


Route::get('app-setting', 'Website\HomeController@setting');


Route::group(['namespace' => 'Website'], function () {
    
    Route::get('place/details/{id}', 'HomeController@appShare');
    Route::get('driver-register', 'HomeController@index');
    Route::get('register/success', 'HomeController@register_success');
    Route::get('register/fail', 'HomeController@register_fail');
    Route::post('update-driver-register', 'HomeController@update_driver_register');
});
