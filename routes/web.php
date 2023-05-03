<?php

use App\Http\Controllers\AgendamentosController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EstágiosController;
use App\Http\Controllers\HistóricoController;
use App\Http\Controllers\OrientacaoEstagiosController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;

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
    return view('/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/auth/google/redirect', [GoogleController::class, 'redirect']);
 
Route::get('/auth/google/callback', [GoogleController::class, 'callback']);
 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('estágios', EstágiosController::class);
Route::resource('agendamentos', AgendamentosController::class);
Route::resource('orientação', OrientacaoEstagiosController::class);
Route::resource('histórico', HistóricoController::class);
Route::resource('contactos', Controller::class);

Route::post('/estagios', [EstágiosController::class, 'store'])->name('estagios.store');

require __DIR__.'/auth.php';

Route::get('calendar', [CalendarController::class, 'show']);
Route::post('calendar/action', [CalendarController::class, 'action']);

