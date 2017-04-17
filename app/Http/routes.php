<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'KaloriController@index');

Route::post('/store', 'KaloriController@store');

Route::post('/filter', 'KaloriController@filter');

Route::post('/update', 'KaloriController@update');

Route::post('/delete', 'KaloriController@delete');

Route::post('/calorieSet', 'KaloriController@setCalorieLimit');

Route::post('/dates', 'KaloriController@date');

