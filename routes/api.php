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

//API route for login user
Route::post('/login', 'LoginController@login');

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    // Route::get('/profile', function(Request $request) {
    //     return auth()->user();
    // });
    // API route for logout user
    Route::post('/logout', 'LoginController@logout');
});

Route::get('/loker', 'VacancyController@index');
Route::post('/loker', 'VacancyController@store');
Route::get('/loker/{id}', 'VacancyController@show');
Route::delete('/loker/{vacancy:id}', 'VacancyController@destroy');
// Route::put('/loker', 'VacancyController@update');
Route::get('/post', 'PostController@index');
Route::get('/post/{id}', 'PostController@show');
Route::delete('/post/{id}', 'PostController@destroy');
Route::post('/register', 'RegisterController@store');
Route::get('/report/{id}', 'ReportController@index');
Route::post('/report', 'ReportController@store');
Route::delete('/report/{id}', 'ReportController@destroy');



