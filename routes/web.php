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

Route::get('/', function () {
    return view('welcome');
});
Route::get('jobs', 'HomeController@jobs');
Route::get('users', 'HomeController@users');
Route::get('convenience', 'HomeController@convenience');
Route::get('qa', 'HomeController@qa');
Route::get('payers', 'HomeController@payers');
Route::get('advertisers', 'HomeController@advertisers');
Route::get('ads', 'HomeController@ads');
Route::get('tinalab', 'HomeController@tinalab');
Route::post('image-upload', 'HomeController@imageUpload');
Route::post('get-jobs', 'HomeController@getJobs');
