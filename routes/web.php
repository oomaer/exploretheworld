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

Route::get('/', 'App\Http\Controllers\HomeController@index');

Route::get('/register', 'App\Http\Controllers\Auth\UserController@register');
Route::post('/register', 'App\Http\Controllers\Auth\UserController@store');

Route::get('/login', 'App\Http\Controllers\Auth\UserController@login');
Route::post('/login', 'App\Http\Controllers\Auth\UserController@match');

Route::get('/editprofile', 'App\Http\Controllers\Auth\UserController@editprofile');
Route::post('/editprofile', 'App\Http\Controllers\Auth\UserController@update');

Route::get('/logout', 'App\Http\Controllers\Auth\UserController@logout');

Route::get('/addlocation', 'App\Http\Controllers\LocationController@addLocation');
Route::post('/addlocation', 'App\Http\Controllers\LocationController@store');

Route::get('/updatelocation/{id}', 'App\Http\Controllers\LocationController@updateLocation');
Route::post('/updatelocation/{id}', 'App\Http\Controllers\LocationController@update');

Route::get('/location/{id}', 'App\Http\Controllers\LocationController@viewLocation');

Route::get('/deletelocation/{id}', 'App\Http\Controllers\LocationController@delete');

Route::get('/searchlocations/{search}', 'App\Http\Controllers\LocationController@searchlocation');

Route::get('/addevent', 'App\Http\Controllers\EventController@addEvent');
Route::post('/addevent', 'App\Http\Controllers\EventController@store');
Route::get('/updateevent/{id}', 'App\Http\Controllers\EventController@updateEvent');
Route::post('/updateevent/{id}', 'App\Http\Controllers\EventController@update');


Route::post('/postreview/{location_id}', 'App\Http\Controllers\ReviewController@store');
Route::post('/updatereview/{id}', 'App\Http\Controllers\ReviewController@update');

Route::get('/deletereview/{id}', 'App\Http\Controllers\ReviewController@delete');
