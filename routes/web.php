<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AchatController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Http\Controllers\OuvrageController;
use App\Http\Controllers\AbonneController;
use App\Http\Controllers\EmpruntController;

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


Route::get('/ouvrages', [OuvrageController::class, 'index'])->name('ouvrages.index');
Route::get('/ouvrages/create', [OuvrageController::class, 'create'])->name('ouvrages.create');
Route::post('/ouvrages', [OuvrageController::class, 'store'])->name('ouvrages.store');
Route::get('/ouvrages/{Id}/edit', [OuvrageController::class, 'edit'])->name('ouvrages.edit');
Route::put('/ouvrages/{Id}', [OuvrageController::class, 'update'])->name('ouvrages.update');
Route::delete('/ouvrages/{Id}', [OuvrageController::class, 'destroy'])->name('ouvrages.destroy');

Route::get('/achats', [AchatController::class, 'index'])->name('achats.index');
Route::get('/achats/create', [AchatController::class, 'create'])->name('achats.create');
Route::post('/achats', [AchatController::class, 'store'])->name('achats.store');
Route::get('/achats/{IdAchat}/edit', [AchatController::class, 'edit'])->name('achats.edit');
Route::put('/achats/{IdAchat}', [AchatController::class, 'update'])->name('achats.update');
Route::delete('/achats/{IdAchat}', [AchatController::class, 'destroy'])->name('achats.destroy');

Route::get('/abonnes', [AbonneController::class, 'index'])->name('abonnes.index');
Route::get('/abonnes/create', [AbonneController::class, 'create'])->name('abonnes.create');
Route::post('/abonnes', [AbonneController::class, 'store'])->name('abonnes.store');
Route::get('/abonnes/{Id}/edit', [AbonneController::class, 'edit'])->name('abonnes.edit');
Route::put('/abonnes/{Id}', [AbonneController::class, 'update'])->name('abonnes.update');
Route::delete('/abonnes/{Id}', [AbonneController::class, 'destroy'])->name('abonnes.destroy');

Route::get('/emprunts', [EmpruntController::class, 'index'])->name('emprunts.index');
Route::get('/emprunts/create', [EmpruntController::class, 'create'])->name('emprunts.create');
Route::post('/emprunts', [EmpruntController::class, 'store'])->name('emprunts.store');
Route::get('/emprunts/{IdEmprunt}/edit', [EmpruntController::class, 'edit'])->name('emprunts.edit');
Route::put('/emprunts/{IdEmprunt}', [EmpruntController::class, 'update'])->name('emprunts.update');
Route::delete('/emprunts/{IdEmprunt}', [EmpruntController::class, 'destroy'])->name('emprunts.destroy');

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


