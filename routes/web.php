<?php

use App\Http\Controllers\AgendamentosController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\ContactosController;
use App\Http\Controllers\EstágiosController;
use App\Http\Controllers\PresençasController;
use App\Http\Controllers\HistóricoController;
use App\Http\Controllers\OrientacaoEstagiosController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\UserController;
use App\Models\Histórico;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('/auth/login');
});

Route::get('/auth/google/redirect', [GoogleController::class, 'redirect']);
 
Route::get('/auth/google/callback', [GoogleController::class, 'callback']);
 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/save-curso', [ProfileController::class, 'saveCurso'])->name('profile.saveCurso');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('estágios', EstágiosController::class);
Route::resource('agendamentos', AgendamentosController::class);
Route::resource('presenças', PresençasController::class);
Route::resource('orientação', OrientacaoEstagiosController::class);
Route::resource('histórico', HistóricoController::class);
Route::resource('contactos', ContactosController::class);

//Route::post('/estagios', [EstágiosController::class, 'store'])->name('estagios.store');

require __DIR__.'/auth.php';

Route::get('calendar', [CalendarController::class, 'show']);
Route::post('calendar/action', [CalendarController::class, 'action']);

Route::get('generate-pdf/{name}', [PDFController::class, 'generatePDF']);

