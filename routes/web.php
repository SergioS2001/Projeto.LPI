<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomepageController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});


Route::get('/homepage', [HomepageController::class,'index'])->name('index');
Route::get('/login', [LoginController::class,'login'])->name('login');
Route::get('/register', [RegisterController::class,'register'])->name('register');
Route::get('/admin', [AdminController::class,'admin'])->name('admin');
