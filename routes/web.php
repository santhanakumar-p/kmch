<?php

use App\Http\Controllers\DoctorController;
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
});

require __DIR__.'/auth.php';

Route::get('doctors', [DoctorController::class, 'index'])->name('doctors.index')->middleware('auth');
Route::get('doctors/create', [DoctorController::class, 'create'])->name('doctors.create')->middleware('auth');
Route::post('doctors', [DoctorController::class, 'store'])->name('doctors.store')->middleware('auth');
Route::get('doctors/{id}/edit', [DoctorController::class, 'edit'])->name('doctors.edit')->middleware('auth');
Route::put('doctors/{id}', [DoctorController::class, 'update'])->name('doctors.update')->middleware('auth');
Route::delete('doctors/{id}', [DoctorController::class, 'destroy'])->name('doctors.destroy')->middleware('auth');
