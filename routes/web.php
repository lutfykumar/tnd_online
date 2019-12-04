<?php

//Auth::routes();
Route::get('/clear-cache', function() {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    return 'DONE'; //Return anything
});



Route::get('/', 'Auth\LoginController@showloginform')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.do');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/reset', 'Auth\ForgotPasswordController@reset');
Route::get('password/reset/{token}', 'Auth\ForgotPasswordController@showResetForm')->name('password.reset');

Route::group(['middleware' => ['auth']], function () {
	Route::get('profile', 'Back\UserController@profile')->name('peserta.profile');
	Route::post('password', 'Back\UserController@doPassword');
	
	Route::group(['middleware' => ['level_id:2']], function () {
		Route::get('dashboard', 'HomeController@index')->name('h.schedule');
		
		Route::get('training/pretest/{id}', 'Peserta\DashboardController@pretest')->name('h.training.pretest');
		Route::post('training/pretest/{id}', 'Peserta\DashboardController@storePretest')->name('h.training.pretest.store');
		Route::get('training/pretest/{id}/nilai', 'Peserta\DashboardController@nilaiPretest')->name('h.training.pretest.nilai');
		
		Route::get('training/postest/{id}', 'Peserta\DashboardController@postest')->name('h.training.postest');
		Route::post('training/postest/{id}', 'Peserta\DashboardController@updatePostest')->name('h.training.postest.update');
		Route::get('training/postest/{id}/nilai', 'Peserta\DashboardController@nilaiPostest')->name('h.training.postest.nilai');
		
		Route::get('training/evaluation/{id}', 'Peserta\DashboardController@evaluation')->name('h.training.evaluation');
		Route::post('training/evaluation/{id}', 'Peserta\DashboardController@storeEvaluation')->name('h.training.evaluation.store');
		
		Route::get('training/finish/{id}', 'Peserta\DashboardController@finish')->name('h.training.finish');
		
		Route::get('training/video/{id}', 'Peserta\DashboardController@video')->name('h.training.video');
		Route::get('training/video/view/{id}', 'Peserta\DashboardController@detailModal')->name('h.training.view');
		Route::get('table/p/dashboard', 'Peserta\DashboardController@dataTablePeserta')->name('table.h.p');
	});
});