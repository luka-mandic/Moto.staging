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



Route::get('/servisi/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/servisi/login', 'Auth\LoginController@login');
Route::post('/servisi/logout', 'Auth\LoginController@logout')->name('logout');


Route::get('/servisi', 'MotorController@index')->name('servisi');

Route::post('/servisi/search', 'MotorController@search');

Route::get('/servisi/create', 'MotorController@create');

Route::post('/servisi', 'MotorController@store');

Route::get('/servisi/{motor}', 'MotorController@show');

Route::get('/servisi/{motor}/edit', 'MotorController@edit');

Route::put('/servisi/{motor}' , 'MotorController@update');

Route::patch('/servisi/{motor}' , 'MotorController@update');

Route::delete('/servisi/{motor}', 'MotorController@destroy');


Route::post('/send', 'MailController@send');

Route::post('/servisi/{motor}/servis', 'ServisController@store');

Route::delete('/servisi/servis/{servis}', 'ServisController@destroy');

Route::put('/servisi/servis/{servis}' , 'ServisController@update');