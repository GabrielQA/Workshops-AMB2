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

Route::middleware(['jwt.auth'])->group(function()
{
    Route::get('tasks', 'TasksController@getAll')->name('getAllTasks');
    Route::post('tasks', 'TasksController@add')->name('addTasks');
    Route::get('tasks/{id}', 'TasksController@get')->name('getTasks');
    Route::patch('tasks/{id}', 'TasksController@edit')->name('editTasks');
    Route::delete('tasks/delete/{id}', 'TasksController@delete')->name('deleteTasks');
});

Route::post('login', 'AuthenticateController@authenticate')->name('login');