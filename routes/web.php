<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','normal'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/superadmin', function () {
    return view('superadmin');
})->middleware(['auth', 'verified','superadmin'])->name('superadmin');

Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth', 'verified','admin'])->name('admin');



require __DIR__.'/auth.php';
