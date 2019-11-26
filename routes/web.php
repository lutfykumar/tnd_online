<?php

//Auth::routes();
Route::get('/clear-cache', function() {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'Auth\LoginController@showloginform')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.do');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/reset', 'Auth\ForgotPasswordController@reset');
Route::get('password/reset/{token}', 'Auth\ForgotPasswordController@showResetForm')->name('password.reset');

Route::group(['middleware' => ['auth']], function () {
    Route::get('profile', 'Back\UserController@profile')->name('peserta.profile');
});