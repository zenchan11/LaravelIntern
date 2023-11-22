<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\We;

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


//authentication
Route::get('/', [WelcomeController::class,'welcome']);
Route::get('/login', [LoginController::class,'login']);
Route::get('/register', [LoginController::class,'register']);
Route::post('/registerUser', [LoginController::class, 'registerUser'])->name('registerUser');
Route::post('/loginUser', [LoginController::class, 'loginUser'])->name('loginUser');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

