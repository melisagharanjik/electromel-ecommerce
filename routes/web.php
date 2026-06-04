<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/product/{id}', [HomeController::class, 'productDetail'])
    ->name('product.detail');

/*
|--------------------------------------------------------------------------
| Cart Routes
|--------------------------------------------------------------------------
*/

Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');

Route::get('/cart/add/{id}', [CartController::class, 'add'])
    ->name('cart.add');

Route::get('/cart/remove/{id}', [CartController::class, 'remove'])
    ->name('cart.remove');

Route::get('/cart/increase/{id}', [CartController::class, 'increase'])
    ->name('cart.increase');

Route::get('/cart/decrease/{id}', [CartController::class, 'decrease'])
    ->name('cart.decrease');

Route::get('/checkout', [CartController::class, 'checkout'])
    ->name('checkout.index');

Route::post('/checkout/store', [CartController::class, 'checkoutStore'])
    ->name('checkout.store');

/*
|--------------------------------------------------------------------------
| Wishlist Routes
|--------------------------------------------------------------------------
*/

Route::get('/wishlist', [WishlistController::class, 'index'])
    ->name('wishlist.index');

Route::get('/wishlist/add/{id}', [WishlistController::class, 'add'])
    ->name('wishlist.add');

Route::get('/wishlist/remove/{id}', [WishlistController::class, 'remove'])
    ->name('wishlist.remove');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/admin/dashboard', function () {

        $categoryCount = \App\Models\Category::count();
        $productCount = \App\Models\Product::count();

        $orderCount = \App\Models\Order::count();

        $pendingOrders = \App\Models\Order::where('status', 'Pending')->count();

        $completedOrders = \App\Models\Order::where('status', 'Completed')->count();

        $totalRevenue = \App\Models\OrderItem::selectRaw('SUM(price * quantity) as total')
            ->value('total');

        return view('admin.dashboard', compact(
            'categoryCount',
            'productCount',
            'orderCount',
            'pendingOrders',
            'completedOrders',
            'totalRevenue'
        ));

    })->name('admin.dashboard');

    /*
    |--------------------------------------------------------------------------
    | Admin Category Routes
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/category', [CategoryController::class, 'index'])
        ->name('admin.category.index');

    Route::get('/admin/category/create', [CategoryController::class, 'create'])
        ->name('admin.category.create');

    Route::post('/admin/category/store', [CategoryController::class, 'store'])
        ->name('admin.category.store');

    Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit'])
        ->name('admin.category.edit');

    Route::post('/admin/category/update/{id}', [CategoryController::class, 'update'])
        ->name('admin.category.update');

    Route::get('/admin/category/delete/{id}', [CategoryController::class, 'destroy'])
        ->name('admin.category.delete');

    /*
    |--------------------------------------------------------------------------
    | Admin Product Routes
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/product', [ProductController::class, 'index'])
        ->name('admin.product.index');

    Route::get('/admin/product/create', [ProductController::class, 'create'])
        ->name('admin.product.create');

    Route::post('/admin/product/store', [ProductController::class, 'store'])
        ->name('admin.product.store');

    Route::get('/admin/product/edit/{id}', [ProductController::class, 'edit'])
        ->name('admin.product.edit');

    Route::post('/admin/product/update/{id}', [ProductController::class, 'update'])
        ->name('admin.product.update');

    Route::get('/admin/product/delete/{id}', [ProductController::class, 'destroy'])
        ->name('admin.product.delete');

    /*
    |--------------------------------------------------------------------------
    | Admin Order Routes
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/order', [OrderController::class, 'index'])
        ->name('admin.order.index');

    Route::get('/admin/order/show/{id}', [OrderController::class, 'show'])
        ->name('admin.order.show');

    Route::post('/admin/order/status/{id}', [OrderController::class, 'updateStatus'])
        ->name('admin.order.status');

});

/*
|--------------------------------------------------------------------------
| Breeze Dashboard / Profile Routes
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';
