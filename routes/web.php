<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    Route::get('/admin', function () {
        return 'Bienvenue sur le tableau de bord ADMIN';
    });

    Route::get('/enseignant', function () {
        return 'Bienvenue sur le tableau de bord ENSEIGNANT';
    });

    Route::get('/etudiant', function () {
        return 'Bienvenue sur le tableau de bord ÉTUDIANT';
    });
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });

    Route::get('/enseignant', function () {
        return view('enseignant.dashboard');
    });

    Route::get('/etudiant', function () {
        return view('etudiant.dashboard');
    });
});

require __DIR__.'/auth.php';
