<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [TeamController::class, 'index'])->middleware('auth');
Route::get('/teams/{id}', [TeamController::class, 'show'])->name('singleTeam')->middleware('auth');

Route::get('/news/create', [NewsController::class, 'create'])->name('createNews')->middleware('auth');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('singleNews')->middleware('auth');
Route::get('/news/team/{teamName}', [NewsController::class, 'getNewsByTeamName'])->name('newsForTeam')->middleware('auth');
Route::get('/news', [NewsController::class, 'index'])->name('news')->middleware('auth');
Route::post('/news', [NewsController::class, 'store']);

Route::get('/players/{id}', [PlayerController::class, 'show'])->name('singlePlayer')->middleware('auth');

Route::get('/verify/{id}', [RegisterController::class, 'verify'])->name('verify');
Route::post('/resend-verification/{user}', [RegisterController::class, 'resendVerificationEmail'])->name('resend-verification');
Route::get('/register', [RegisterController::class, 'getRegisterView']);
Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::get('/login', [LoginController::class, 'getLoginView']);
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/teams/{id}/comments', [CommentController::class, 'store'])->middleware('forbiddenWords');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
