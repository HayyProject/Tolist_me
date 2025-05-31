<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\authController;

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

Route::redirect('/', '/home');
Route::get('/home', [TodoController::class, 'home'])->name('todos.home');
Route::get('/login', [TodoController::class, 'loginForm'])->name('todos.login');
Route::get('/register', [TodoController::class, 'registerForm'])->name('todos.register');

Route::post('/login', [authController::class, 'login',])->name('login');
Route::post('/register', [authController::class, 'register'])->name('register');
Route::post('/logout' ,[authController::class, 'logout'])->name('logout');





Route::resource('todos', TodoController::class);
