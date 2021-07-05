<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;

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
    return view('welcome');
});


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home','HomeController@index')->name('home');

Route::group(['middleware'=>'auth'] ,function(){
    
    Route::get('/home',[HomeController::class,'index'])->name('home');
    Route::get('/users',[UserController::class,'index'])->name('users');
    Route::get('/users/create',[UserController::class,'create'])->name('users.create');
    Route::post('/users',[UserController::class,'store'])->name('users.store');
    Route::get('/users/{user}',[UserController::class,'show'])->name('users.show');
    Route::get('/users/{user}/edit',[UserController::class,'edit'])->name('users.edit');
    Route::post('/users/{user}',[UserController::class,'update'])->name('users.update');
    Route::delete('/users/{user}',[UserController::class,'destroy'])->name('users.destroy');
});
 


