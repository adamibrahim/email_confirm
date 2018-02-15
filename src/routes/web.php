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
Route::get('/confirm/{id}', 'ConfirmController@index')->name('confirm.email');
Route::post('/confirm', 'ConfirmController@resendConfirm')->name('confirm.resend');
Route::get('/confirm_email/{confirm_token}', 'ConfirmController@confirmEmail')->name('confirm.token');
