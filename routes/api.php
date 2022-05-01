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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/loker', 'VacancyController@index');
Route::get('/loker/{id}', 'VacancyController@show');
Route::delete('/loker/{vacancy:id}', 'VacancyController@destroy');
Route::post('/loker', 'VacancyController@store');
// Route::put('/loker', 'VacancyController@update');
Route::get('/post/{id}', 'PostController@show');
Route::get('/post', 'PostController@index');


