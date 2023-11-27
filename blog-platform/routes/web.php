<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
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

//BlogController

Route::get('/', [BlogController::class,'index'])->name('blog');
Route::get('/create',[BlogController::class,'create']);
Route::post('/store',[BlogController::class,'store']);
Route::get('/show/{id}',[BlogController::class, 'show']);
Route::get('/delete/{id}',[BlogController::class,'destroy']);
Route::get('/edit/{id}',[BlogController::class,'edit']);
Route::post('/update/{id}',[BlogController::class,'update']);



//authentication
Route::get('/login', [LoginController::class,'login'])->name('login');
Route::get('/register', [LoginController::class,'register'])->name('register');
Route::post('/registerUser', [LoginController::class, 'registerUser'])->name('registerUser');
Route::post('/loginUser', [LoginController::class, 'loginUser'])->name('loginUser');
Route::get('/dashboard', [DashboardController::class, 'Authdashboard'])->name('dashboard')->middleware('auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

//admin
Route::get('/admin/login', [AdminController::class,'login'])->name('admin.login');
Route::get('/admin/register', [AdminController::class,'register'])->name('admin.register');
Route::post('/admin/registerUser', [AdminController::class, 'registerUser'])->name('admin.registerUser');
Route::post('/admin/loginUser', [AdminController::class, 'loginUser'])->name('admin.loginUser');
Route::get('/admin/dashboard', [DashboardController::class, 'Admindashboard'])->name('admin.dashboard')->middleware(['IsAdmin']);
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');//->middleware('IsAdmin');
Route::get('/admin/show/{id}', [AdminController::class, 'show'])->name('admin.show');//->middleware('IsAdmin');
Route::get('/admin/approve/{id}',[AdminController::class, 'approve'])->name('admin.approve');

