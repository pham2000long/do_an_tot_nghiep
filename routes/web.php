<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Page;

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

// Admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [Admin\AuthController::class, 'index'])->name('auth.login.index');
    Route::post('/login', [Admin\AuthController::class, 'login'])->name('auth.login');
    Route::middleware(['auth'])->group(function() {
        Route::get('/logout', [Admin\AuthController::class, 'logout'])->name('auth.logout');
        Route::get('/index', [Admin\DashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('slides', Admin\SlideController::class);
        Route::post('/slides/updateStatus', [Admin\SlideController::class, 'updateStatus'])->name('slide.updateStatus');
        Route::resource('productTypes', Admin\ProductTypeController::class);
        Route::resource('categories', Admin\CategoryController::class);
        Route::resource('suppliers', Admin\SupplierController::class);
        Route::prefix('products')->group(function() {
            Route::get('/', [Admin\ProductController::class, 'index'])->name('products.index');
            Route::get('/create', [Admin\ProductController::class, 'create'])->name('products.create');
            Route::post('/store', [Admin\ProductController::class, 'store'])->name('products.store');
            Route::get('/edit/{id}', [Admin\ProductController::class, 'edit'])->name('products.edit');
            Route::post('/update/{id}', [Admin\ProductController::class, 'update'])->name('products.update');
            Route::post('/productDetail/deleteImage', [Admin\ProductController::class, 'deleteProductImage'])
                ->name('product.product_detail.delete_image');
            Route::delete('/{id}', [Admin\ProductController::class, 'delete'])->name('products.delete');
            Route::post('/updateStatus', [Admin\ProductController::class, 'updateStatus'])->name('products.updateStatus');
        });
        Route::resource('promotions', Admin\PromotionController::class);
        Route::post('/promotions/updateStatus', [Admin\PromotionController::class, 'updateStatus'])->name('promotion.updateStatus');
        Route::prefix('users')->group(function() {
            Route::get('/', [Admin\UserController::class, 'index'])->name('users.index');
            Route::get('/create', [Admin\UserController::class, 'create'])->name('users.create');
            Route::post('/store', [Admin\UserController::class, 'store'])->name('users.store');
            Route::get('/profile/{id}', [Admin\UserController::class, 'profile'])->name('users.profile');
            Route::post('/destroy/{id}', [Admin\UserController::class, 'destroy'])->name('users.destroy');
        });
    });
});

// User
Route::group(['prefix' => '/'], function () {
    Route::get('/', [Page\HomeController::class, 'index'])->name('home.index');
    Route::get('/products/{id}', [Page\ProductDetailController::class, 'findProductDetail'])->name('pages.product_detail');
    Route::get('/shop', [Page\ShopController::class, 'index'])->name('pages.shop');
    Route::post('/addToCart', [Page\CartController::class, 'addCart'])->name('carts.addCart');
    Route::get('/showCart', [Page\CartController::class, 'showCart'])->name('carts.show');
});
