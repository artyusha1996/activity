<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('participants')->group(function () {
    Route::delete('/{id}', 'ParticipantController@destroy');
    Route::put('/{id}', 'ParticipantController@update');
});

Route::prefix('activities/{activityId}')->group(function () {
    Route::prefix('participants')->group(function () {
        Route::get('/', 'ParticipantController@index');
        Route::post('/', 'ParticipantController@store');
    });
});
