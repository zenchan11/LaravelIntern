<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProvisionServer;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\datbase_raw_queries;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Form;
use App\Http\Controllers\formController;
use App\Http\Controllers\tablesdata;
use App\Http\Controllers\formedit;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthenticationController;
use App\Notifications\InvoicePaid;
use App\Mail\mailservice;
use App\Mail\OrderShipped;

use Illuminate\Support\Facades\Mail;



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
 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/greeting',function(){
    return view('greeting');
});

Route::post('/submit', [formController::class,'submit']);

Route::post('/edit/{id}', function ($id){
    return view('formedit',['id'=> $id]);
});

Route::post('/edit',[formedit::class,'edit']);


Route::get('/tables',[tablesdata::class, 'retrieve']
)->name('tables');

Route::get('/view', function(){
    return view('example');

    
});
Route::get('/datbase', [datbase_raw_queries::class, 'index']);

Route::get('/view',function(){
    return view('validation');
});

 
Route::get('/post/create', [PostController::class, 'create']);
Route::post('/post', [PostController::class, 'store']);

Route::get('/authentication', function(){
    return view('authentication');
});

Route::post('/login',[AuthenticationController::class,'store']);

Route::get('/mail', function(){
    Mail::to('ngawangsopha@gmail.com')->send(new OrderShipped(['message' => 'This is a test email']));

});

Route::get('/notify',function(){
    Notification::route('mail','taylor@example.com')
        ->notify(new InvoicePaid);
});
