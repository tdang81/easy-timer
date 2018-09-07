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

//Route::resource('/projects', 'ProjectsController', [
//    'except' => ['edit', 'show', 'store']
//]);

Route::get('/projects', 'ProjectsController@index');
Route::post('/projects', 'ProjectsController@create');
Route::put('/projects/{id}', 'ProjectsController@update');
Route::delete('/projects/{id}', 'ProjectsController@delete');

Route::get('/trackings', 'TrackingsController@index');
Route::post('/trackings', 'TrackingsController@create');
Route::put('/trackings/{id}', 'TrackingsController@update');
Route::delete('/trackings/{id}', 'TrackingsController@delete');
