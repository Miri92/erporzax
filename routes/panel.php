<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthenticateAdmin;
use App\Http\Controllers\Panel\MenuController;
use App\Http\Controllers\Panel\UserController;
use App\Http\Controllers\Panel\PageController;
use App\Http\Controllers\Panel\SliderController;
use App\Http\Controllers\Panel\OptionsController;
use App\Http\Controllers\Panel\QuestionController;
use App\Http\Controllers\Panel\DashboardController;
use App\Http\Controllers\Panel\DocController;
use App\Http\Controllers\Panel\SocialIconController;
use App\Http\Controllers\Panel\Auth\LoginController;
use App\Http\Controllers\Panel\TestimonialController;
use App\Http\Controllers\Panel\ProductPurchaseController;
use App\Http\Controllers\Panel\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::middleware([AuthenticateAdmin::class])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::controller(UserController::class)
        ->prefix('user')
        ->name('user.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/edit/{user}', 'edit')->name('edit');
            Route::post('/edit/{user}', 'update')->name('update');
        });

    Route::controller(SocialIconController::class)
        ->prefix('socialicon')
        ->name('social_icon.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{social_icon}', 'edit')->name('edit');
            Route::post('/edit/{social_icon}', 'update')->name('update');
            Route::post('/delete/{social_icon}', 'delete')->name('delete');
        });

    Route::controller(OptionsController::class)
        ->prefix('options')
        ->name('options.')->group(function () {
            Route::get('/edit/{options}', 'edit')->name('edit');
            Route::post('/edit/{options}', 'update')->name('update');
        });

    Route::controller(ProductPurchaseController::class)
        ->prefix('product-purchases')
        ->name('product_purchases.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{product_purchase}', 'edit')->name('edit');
            Route::post('/edit/{product_purchase}', 'update')->name('update');
            Route::get('/show/{product_purchase}', 'show')->name('show');
            Route::post('/delete/{product_purchase}', 'destroy')->name('destroy');
        });

    Route::controller(ProductController::class)
        ->prefix('products')
        ->name('products.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{product}', 'edit')->name('edit');
            Route::post('/edit/{product}', 'update')->name('update');
            Route::get('/show/{product}', 'show')->name('show');
            Route::post('/delete/{product}', 'destroy')->name('destroy');
            Route::get('/search', 'searchProductAjax')->name('search');
            
        });
});
