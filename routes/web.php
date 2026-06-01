<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/admin/category', [CategoryController::class, 'index'])
    ->middleware(['auth'])
    ->name('admin.category.index');

Route::get('/admin/category/create', [CategoryController::class, 'create'])
    ->middleware(['auth'])
    ->name('admin.category.create');

Route::post('/admin/category/store', [CategoryController::class, 'store'])
    ->middleware(['auth'])
    ->name('admin.category.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
