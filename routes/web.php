<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['middleware' => 'localization'], function () {
	Route::get('/', 'UrlController@index')->name('main');
	Route::get('/download', 'UrlController@download')->name('download');
	Route::get('/lang', 'UrlController@setLanguage')->name('lang');
	
	Route::post('/', 'UrlController@create')->name('forma');


	Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');

	Auth::routes();

	Route::get('/home', 'Urlcontroller@index');
});




