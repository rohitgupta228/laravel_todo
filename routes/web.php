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

Route::get('/', 'AuthController@home');

Auth::routes();


Route::group(['middleware' => 'auth'], function() {
    
    Route::get('/todo', 'TodoController@index')->name('todo.index');
    Route::get('/todo/create', 'TodoController@create')->name('todo.create');
    Route::get('/todo/edit/{id}', 'TodoController@edit')->name('todo.edit');
});

Route::get('/home', 'HomeController@index')->name('home');
