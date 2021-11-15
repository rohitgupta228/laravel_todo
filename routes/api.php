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

Route::post('/todo/store', 'Api\TodoController@store')->name('todo.store');
Route::post('/todo/update', 'Api\TodoController@update')->name('todo.update');
Route::get('/todo/{id}', 'Api\TodoController@destroy')->name('todo.destroy');
