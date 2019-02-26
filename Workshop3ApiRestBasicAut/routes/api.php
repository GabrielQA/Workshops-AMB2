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

Route::middleware(['basicAuth'])->group(function () {
    Route::post('/student', 'StudentsController@create');
	Route::get('/students', 'StudentsController@show');
	Route::get('/student/{id}', 'StudentsController@showbyid');
	Route::put('/studentupdate/{id}', 'StudentsController@updatebyid');
	Route::delete('/studentdelete/{id}', 'StudentsController@deletebyid');
});