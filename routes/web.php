<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\QuadroController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('artisti', ArtistaController::class);
    Route::resource('quadri', QuadroController::class);
        Route::get('/artisti/{artista}/quadri', [ArtistaController::class, 'gestisciQuadri'])->name('artisti.gestisci_quadri');
    Route::post('/artisti/{artista}/quadri', [QuadroController::class, 'store'])->name('quadros.store');

   
});

require __DIR__.'/auth.php';


