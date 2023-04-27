<?php

use App\Http\Controllers\AgendamentosController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EstágiosController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\HistóricoController;
use App\Http\Controllers\OrientacaoEstagiosController;
use App\Http\Controllers\ProfileController;
use App\Models\Orientacao_Estagios;
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
    return view('/auth/login');
});

Route::get('/register', function () {
    return view('auth.register');
});

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

#duas novas rotas uma para entrar na google login
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google_auth');
#outra para redirecionar quando sai
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);

require __DIR__.'/auth.php';
