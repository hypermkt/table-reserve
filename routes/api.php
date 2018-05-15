<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function() {
    Route::get('courses', 'Api\V1\CourseController@index');
    Route::post('reservations', 'Api\V1\ReservationController@store');
    Route::resource('restaurants', 'Api\V1\RestaurantController')->only(['show', 'update']);
    Route::get('reservations/schedules/months', 'Api\V1\Reservation\Schedule\MonthController@index');
});
