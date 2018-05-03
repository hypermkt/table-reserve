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

Route::resource('table_types', 'TableTypeController');
Route::resource('courses', 'CourseController');
Route::resource('stocks', 'StockController');

Route::get('auth/twitter', 'Auth\SocialLoginController@redirectToProvider');
Route::get('auth/twitter/callback', 'Auth\SocialLoginController@handleProviderCallback');
Route::get('auth/twitter/logout', 'Auth\SocialLoginController@logout');
