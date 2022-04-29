<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\VacancyController;
use App\Models\Vacancy;

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

// Route::get('/',  [HomeController::class, 'index']);
// Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::post('/login', [LoginController::class, 'authenticate']);
// Route::post('/logout', [LoginController::class, 'logout']);
// Route::get('/uploadpost', [PostController::class, 'create'])->middleware('auth');
// Route::post('/uploadpost', [PostController::class, 'store']);
// Route::get('/posts', [PostController::class, 'index']);
// Route::get('/posts/{post:id}', [PostController::class, 'show']);
// Route::get('/posts/{post:id}/edit', [PostController::class, 'edit']);
// Route::put('/posts/{post:id}', [PostController::class, 'update']);
// Route::get('/report/{post:id}', [ReportController::class, 'index']);
// Route::post('/report', [ReportController::class, 'store']);
// Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
// Route::post('/register', [RegisterController::class, 'store']);
// Route::resource('/profile', UserController::class)->middleware('auth');
// Route::get('/profile/{username}', function ($username) {
//     $title = "My Profile";
//     $username = User::where('username', $username)->first()->username;
//     $id = User::where('username', $username)->first()->id;
//     $my_posts = Post::where('user_id', $id)->get();
//     return view('/user/profile', compact(['title', 'my_posts']));
// });

// Route::get('/loker', [VacancyController::class, 'index']);
// Route::get('/loker/{vacancy:id}', [VacancyController::class, 'show']);


// Route::get('/form', function () {
//     return view('formloker');
// });

// Route::get('/company', [CompanyController::class, 'index']);
// Route::post('/company/verify', [CompanyController::class, 'store']);
