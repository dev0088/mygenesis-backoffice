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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/permit', 'HomeController@permit')->name('permit');
Route::get('/candidates', 'HomeController@candidates')->name('candidates');
Route::get('/jobs', 'HomeController@jobs')->name('jobs');
Route::get('/settings', 'HomeController@settings')->middleware('is_admin')->name('settings');
Route::get('/settings/{id}','HomeController@destroy')->middleware('is_admin')->name('settings.destroy');
Route::post('/addregister', 'HomeController@addregister')->middleware('is_admin')->name('addregister');
Route::post('/get-jobs', 'HomeController@getJobs')->name('getjobs');