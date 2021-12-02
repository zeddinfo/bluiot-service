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

Route::post('position', 'User\UserPositionController@position');
Route::get('position', 'User\UserPositionController@get_position');
Route::post('update_position', 'User\UserPositionController@update_position');

Route::get('visitors', 'VisitorController@getVisitors');

Route::post('login', 'User\UserController@login');
Route::get('login', 'User\UserController@get_login');
Route::post('visibleLocation', 'User\UserController@visibleLocation');
Route::post('statusVisible', 'User\UserController@statusVisible');