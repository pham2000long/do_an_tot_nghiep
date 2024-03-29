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
    Route::get('/forgot-password', [Admin\AuthController::class, 'forgotPass'])->name('auth.forgot_pass');
    Route::post('/send-link-reset', [Admin\AuthController::class, 'sendLink'])->name('auth.send_link_reset');
    Route::get('reset-password/{token}', [Admin\AuthController::class, 'resetPass'])->name('auth.reset_pass');
    Route::post('reset-password', [Admin\AuthController::class, 'updatePass'])->name('auth.update_pass');
    Route::middleware(['auth', 'admin'])->group(function() {
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
            Route::get('/detail/{id}', [Admin\ProductController::class, 'detail'])->name('products.detail');
            Route::post('/update/{id}', [Admin\ProductController::class, 'update'])->name('products.update');
            Route::get('/inventory', [Admin\ProductController::class, 'inventory'])->name('products.inventory');
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
        Route::prefix('orders')->group(function() {
            Route::get('/', [Admin\OrderController::class, 'index'])->name('orders.index');
            Route::get('/order-detail/{id}', [Admin\OrderController::class, 'show'])->name('orders.detail');
            Route::get('/order/{id}', [Admin\OrderController::class, 'edit'])->name('orders.edit');
            Route::post('/order/{id}', [Admin\OrderController::class, 'update'])->name('orders.update');
        });

        // ========================= Báo Cáo Thống Kê ======================================
        Route::group(['prefix' => 'statistic', 'namespace' => 'Statistic'], function () {
            Route::match(['get', 'post'],'/', [Admin\StatisticController::class, 'index'])->name('statistic.index');
            Route::match(['get', 'post'],'/change', [Admin\StatisticController::class, 'edit'])->name('statistic.edit');
        });
    });
});

// User
Route::group(['prefix' => '/'], function () {
    Route::get('/', [Page\HomeController::class, 'index'])->name('home.index');
    Route::get('/products/{id}', [Page\ProductDetailController::class, 'findProductDetail'])->name('pages.product_detail');
    Route::get('/shop', [Page\ShopController::class, 'index'])->name('pages.shop');
    Route::post('/addToCart', [Page\CartController::class, 'addCart'])->name('carts.addCart');
    Route::get('/delete-cart-item/{id}', [Page\CartController::class, 'delete'])->name('carts.delete_cart_item');
    Route::get('/updateQuantity', [Page\CartController::class, 'updateQuantity'])->name('carts.update_quantity');
    Route::get('/delete-checkout-item/{id}', [Page\CheckoutController::class, 'delete'])->name('checkouts.delete_checkout_item');
    Route::get('/updateCheckoutQuantity', [Page\CheckoutController::class, 'updateQuantity'])->name('checkouts.update_checkout_quantity');
    Route::get('/cart-items', [Page\CheckoutController::class, 'listCart'])->name('checkouts.cart_items');
    Route::get('/delivery', [Page\CheckoutController::class, 'delivery'])->name('checkouts.delivery');
    Route::post('/order', [Page\CheckoutController::class, 'order'])->name('checkouts.order');
    Route::prefix('users')->group(function() {
        Route::get('/login', [Page\AuthController::class, 'index'])->name('users.login_index');
        Route::post('/register', [Page\AuthController::class, 'register'])->name('users.register');
        Route::post('/login', [Page\AuthController::class, 'login'])->name('users.login');
        Route::get('/logout', [Page\AuthController::class, 'logout'])->name('users.logout');
    });

    Route::middleware('auth')->group(function() {
        Route::prefix('')->group(function() {
            Route::get('/profile/{id}', [Page\UserController::class, 'profile'])->name('pages.users.profile');
            Route::prefix('orders')->group(function() {
                Route::get('/', [Page\OrderController::class, 'index'])->name('users.orders.index');
                Route::get('/order-detail/{id}', [Page\OrderController::class, 'show'])->name('users.orders.detail');
                Route::get('/order/{id}', [Page\OrderController::class, 'edit'])->name('users.orders.edit');
                Route::post('/order/{id}', [Page\OrderController::class, 'update'])->name('users.orders.update');
            });
        });
    });
    Route::get('/category/{id}', [Page\CategoryController::class, 'getCategory'])->name('categories.detail');
    Route::get('/product-type/{id}', [Page\ProductTypeController::class, 'getProductType'])->name('product_types.detail');
    Route::get('/product-favorite', [Page\FavoriteController::class, 'updateFavorite'])->name('product.update_favorite');
    Route::get('/all-product-favorite', [Page\FavoriteController::class, 'index'])->name('product.favorite');
});
