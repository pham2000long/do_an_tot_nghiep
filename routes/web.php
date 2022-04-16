<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;

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
            Route::get('/{id}', [Admin\ProductController::class, 'edit'])->name('products.edit');
        });
    });
});



