<?php
Route::group(['middleware' => ['web']], function() {
    // Authentication Routes...
    Route::get('login', 'Adam\EmailConfirm\Controllers\Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Adam\EmailConfirm\Controllers\Auth\LoginController@login');
    Route::post('logout', 'Adam\EmailConfirm\Controllers\Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    Route::get('register', 'Adam\EmailConfirm\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Adam\EmailConfirm\Controllers\Auth\RegisterController@register');
    Route::get('register/confirm/{id}', 'Adam\EmailConfirm\Controllers\Auth\ConfirmController@index')->name('confirm.email');
    Route::post('register/confirm', 'Adam\EmailConfirm\Controllers\Auth\ConfirmController@resendConfirm')->name('confirm.resend');
    Route::get('register/confirm_email/{confirm_token}', 'Adam\EmailConfirm\Controllers\Auth\ConfirmController@confirmEmail')->name('confirm.token');

    // Password Reset Routes...
    Route::get('password/reset', 'Adam\EmailConfirm\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Adam\EmailConfirm\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Adam\EmailConfirm\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Adam\EmailConfirm\Controllers\Auth\ResetPasswordController@reset');
    Route::get('/home', 'Adam\EmailConfirm\Controllers\HomeController@index')->name('home');
});