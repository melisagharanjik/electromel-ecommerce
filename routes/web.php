<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Admin Category Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin/category', [CategoryController::class, 'index'])
    ->middleware(['auth'])
    ->name('admin.category.index');

Route::get('/admin/category/create', [CategoryController::class, 'create'])
    ->middleware(['auth'])
    ->name('admin.category.create');

Route::post('/admin/category/store', [CategoryController::class, 'store'])
    ->middleware(['auth'])
    ->name('admin.category.store');

Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit'])
    ->middleware(['auth'])
    ->name('admin.category.edit');

Route::post('/admin/category/update/{id}', [CategoryController::class, 'update'])
    ->middleware(['auth'])
    ->name('admin.category.update');

Route::get('/admin/category/delete/{id}', [CategoryController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('admin.category.delete');

/*
|--------------------------------------------------------------------------
| Admin Product Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin/product', [ProductController::class, 'index'])
    ->middleware(['auth'])
    ->name('admin.product.index');

Route::get('/admin/product/create', [ProductController::class, 'create'])
    ->middleware(['auth'])
    ->name('admin.product.create');

Route::post('/admin/product/store', [ProductController::class, 'store'])
    ->middleware(['auth'])
    ->name('admin.product.store');

Route::get('/admin/product/edit/{id}', [ProductController::class, 'edit'])
    ->middleware(['auth'])
    ->name('admin.product.edit');

Route::post('/admin/product/update/{id}', [ProductController::class, 'update'])
    ->middleware(['auth'])
    ->name('admin.product.update');

Route::get('/admin/product/delete/{id}', [ProductController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('admin.product.delete');

/*
|--------------------------------------------------------------------------
| Breeze Dashboard / Profile Routes
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
