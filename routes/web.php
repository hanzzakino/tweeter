<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TweetsController;

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

Route::get('/', function () {
    return redirect('/feed');
})->name('home')->middleware('auth');

Route::get('/feed', [TweetsController::class, 'index']);
Route::post('/feed/create', [TweetsController::class, 'store']);
Route::delete('/feed/{tweet}', [TweetsController::class, 'destroy']);


Route::get('/user/login',  [UserController::class, 'login'])->name('login')->middleware('guest');

Route::get('/user/register', [UserController::class, 'register'])->middleware('guest');

Route::post('/user/create', [UserController::class, 'create'])->middleware('guest');

Route::get('/user/edit', [UserController::class, 'edit'])->middleware('auth');

Route::post('/user/update', [UserController::class, 'update'])->middleware('auth');

Route::post('/user/authenticate', [UserController::class, 'authenticate'])->middleware('guest');

Route::get('/user/logout', [UserController::class, 'logout'])->middleware('auth');
