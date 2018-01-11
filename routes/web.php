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
    return view('index');
});

Auth::routes();

Route::get('/home', 'MotorController@index')->name('home');

Route::post('/home/search', 'MotorController@search');

Route::get('/home/create', 'MotorController@create');

Route::post('/home', 'MotorController@store');

Route::get('/home/{motor}', 'MotorController@show');

Route::get('/home/{motor}/edit', 'MotorController@edit');

Route::put('/home/{motor}' , 'MotorController@update');

Route::patch('/home/{motor}' , 'MotorController@update');

Route::delete('/home/{motor}', 'MotorController@destroy');


Route::post('/send', 'MailController@send');

Route::post('/home/{motor}/servis', 'ServisController@store');

Route::delete('/home/servis/{servis}', 'ServisController@destroy');

Route::put('/home/servis/{servis}' , 'ServisController@update');