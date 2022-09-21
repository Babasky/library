<?php

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

Route::get('/', function () {
    return view('authentification');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/abonne-register',[App\Http\Controllers\AbonneController::class, 'index'])->name('abonnes.abonneStore');
Route::post('/abonne-create',[App\Http\Controllers\AbonneController::class, 'store'])->name('abonne.create');

Route::get('/fournisseur-register',[App\Http\Controllers\FournisseurController::class, 'index'])->name('fournisseurs.fournisseurStore');
Route::post('/fournisseur-create',[App\Http\Controllers\FournisseurController::class, 'store'])->name('fournisseur.create');

Route::get('/ouvrage-register',[App\Http\Controllers\OuvrageController::class, 'index'])->name('ouvrages.ouvrageStore');
Route::post('/ouvrage-create',[App\Http\Controllers\OuvrageController::class, 'store'])->name('ouvrage.create');