<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterIndexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/',HomeController::class);



Route::prefix('auth/')->group(function () {
    Route::get('login',LoginController::class)->name('auth.login');


    Route::get('register',RegisterIndexController::class)->name('auth.register');

});

// Route::middleware(['auth:sanctum', 'verified'])->group(function () {

// Route::resource('books',BookController::class);


// });

Route::resource('/books', BookController::class);
