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
 Route ::get('tasks','TasksController@getAll')->name('getAllTasks');
 Route ::post('tasks','TasksController@add')->name('addTasks');
 Route ::get('tasks/{id}','TasksController@get')->name('getTasks');
 Route ::post('tasks/{id}','TasksController@edit')->name('editTasks');