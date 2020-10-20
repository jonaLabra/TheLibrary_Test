<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Auth::routes(['reset'=>false]);

Route::resource('/books', 'BooksController')->middleware('auth');
Route::resource('/user', 'LoansController');
Route::resource('/category', 'CategoryController');
Route::get('/borrow', [App\Http\Controllers\LoansController::class, 'getLoans']);
/*Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user', [App\Http\Controllers\HomeController::class, 'getUser']);
Route::get('/user/choose', [App\Http\Controllers\HomeController::class, 'store']);*/

