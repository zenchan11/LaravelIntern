<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
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
Route::get('/', [BlogController::class,'index']);
Route::get('/create',[BlogController::class,'create']);
Route::post('/update',[BlogController::class,'update']);
Route::get('/show/{id}',[BlogController::class, 'show']);
Route::get('/delete/{id}',[BlogController::class,'destroy']);