<?php

use App\Http\Controllers\AgendamentosController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\ContactosController;
use App\Http\Controllers\EstágiosController;
use App\Http\Controllers\PresençasController;
use App\Http\Controllers\HistóricoController;
use App\Http\Controllers\OrientacaoEstagiosController;
use App\Http\Controllers\ProfileController;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\AvaliaçõesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuestionarioController;
use App\Http\Controllers\CertificadosController;
use App\Http\Controllers\DownloadPdfController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyNotification;

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
    Route::patch('/profile/save-emergência', [ProfileController::class, 'saveEmergência'])->name('profile.saveEmergência');
    Route::patch('/profile/save-curso', [ProfileController::class, 'saveCurso'])->name('profile.saveCurso');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('dashboard/update', [DashboardController::class, 'update'])->name('dashboard.update');
Route::post('dashboard/updateconf', [DashboardController::class, 'updateconf'])->name('dashboard.updateconf');
Route::post('dashboard/updateProfile', [DashboardController::class, 'updateprofile'])->name('dashboard.updateProfile');
Route::resource('estágios', EstágiosController::class);
Route::resource('agendamentos', AgendamentosController::class);
Route::resource('presenças', PresençasController::class);
Route::put('/presenças/{id}', [PresençasController::class, 'update'])->name('presenças.update');
Route::resource('orientação', OrientacaoEstagiosController::class);
Route::put('orientação/{presença}', [OrientacaoEstagiosController::class, 'update'])->name('orientação.update');
Route::get('orientação/search', [OrientacaoEstagiosController::class, 'search'])->name('orientação.search');
Route::post('orientação/updateDados', [OrientacaoEstagiosController::class, 'updateDados'])->name('orientação.updateDados');
Route::resource('histórico', HistóricoController::class);
Route::resource('questionário', QuestionarioController::class);
Route::resource('avaliações', AvaliaçõesController::class);
Route::post('/avaliações/modulos', [AvaliaçõesController::class, 'storeModulos'])->name('avaliações.storeModulos');
Route::resource('certificados', CertificadosController::class);

require __DIR__.'/auth.php';

Route::get('/{record}/pdf/agendamentos', [DownloadPdfController::class, 'agendamentos'])->name('pdagendamentos');
Route::get('/{record}/pdf/avaliações', [DownloadPdfController::class, 'avaliações'])->name('pdfavaliações');
Route::get('/{record}/pdf/estágios', [DownloadPdfController::class, 'estágios'])->name('pdfestágios');
Route::get('/{record}/pdf/presenças', [DownloadPdfController::class, 'presenças'])->name('pdfpresenças');
Route::get('/{record}/pdf/cauções', [DownloadPdfController::class, 'cauções'])->name('pdfcauções');
Route::get('/{record}/pdf/cacifoestagio', [DownloadPdfController::class, 'cacifoestagio'])->name('pdfcacifoestagio');
Route::get('/{record}/pdf/orientacaoestagio', [DownloadPdfController::class, 'orientacaoestagio'])->name('pdfoe');
Route::get('/{record}/pdf/solicitacaovagas', [DownloadPdfController::class, 'solicitacaovagas'])->name('pdfsolicitacaovagas');
Route::get('/{record}/pdf/users', [DownloadPdfController::class, 'users'])->name('pdfusers');
Route::get('/{record}/excel/questionarioaluno', [QuestionarioController::class, 'csvquestionarioaluno'])->name('csvquestionarioaluno');

Route::get('/pdf-aluno', [PDFController::class, 'generateCertificadoAlunoPdf'])->name('certificadoaluno');

/*Route::get('/email', function () {
    $userEmail = 'rubenguedes34@gmail.com';
    $userName = 'John Doe';
    $estágios = 'Your Estágios';
    $presenças = 'Your Presenças';
    
    $notification = new MyNotification($userName, $estágios, $presenças);

    Mail::to($userEmail)->send($notification);

    return 'Test email sent successfully!';
});*/

