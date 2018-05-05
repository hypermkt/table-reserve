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

Route::get('login', ['as' => 'login', 'uses' => function () {
    return view('welcome');
}]);

Route::resource('pages/{pageId}/table_types', 'TableTypeController')->middleware('auth');
Route::resource('pages/{pageId}/courses', 'CourseController')->middleware('auth');
Route::resource('pages/{pageId}/stocks', 'StockController')->middleware('auth');
Route::resource('pages', 'PageController')->middleware('auth');

Route::get('auth/twitter', 'Auth\SocialLoginController@redirectToProvider');
Route::get('auth/twitter/callback', 'Auth\SocialLoginController@handleProviderCallback');
Route::get('auth/twitter/logout', 'Auth\SocialLoginController@logout');

Route::get('/{username}/{pageId}', 'ReservationController@index');
Route::get('/{username}/{pageId}/courses/1', 'ReservationController@show');

