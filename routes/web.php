<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });
});

Route::middleware(['auth', 'role:enseignant'])->group(function () {
    Route::get('/enseignant', function () {
        return view('enseignant.dashboard');
    });
});

Route::middleware(['auth', 'role:etudiant'])->group(function () {
    Route::get('/etudiant', function () {
        return view('etudiant.dashboard');
    });
});


require __DIR__.'/auth.php';
