<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthenticateAdmin;
use App\Http\Controllers\Panel\MenuController;
use App\Http\Controllers\Panel\UserController;
use App\Http\Controllers\Panel\SliderController;
use App\Http\Controllers\Panel\OptionsController;
use App\Http\Controllers\Panel\QuestionController;
use App\Http\Controllers\Panel\DashboardController;
use App\Http\Controllers\Panel\DocController;
use App\Http\Controllers\Panel\SocialIconController;
use App\Http\Controllers\Panel\Auth\LoginController;
use App\Http\Controllers\Panel\TestimonialController;

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


    Route::controller(DocController::class)
        ->prefix('doc')
        ->name('doc.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{doc}', 'edit')->name('edit');
        Route::post('/delete/{doc}', 'delete')->name('delete');

        });

    Route::controller(UserController::class)
        ->prefix('user')
        ->name('user.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/edit/{user}', 'edit')->name('edit');
            Route::post('/edit/{user}', 'update')->name('update');
        });

    Route::controller(SliderController::class)
        ->prefix('slider')
        ->name('slider.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{slider}', 'edit')->name('edit');
            Route::post('/edit/{slider}', 'update')->name('update');
            Route::post('/delete/{slider}', 'delete')->name('delete');
        });


    Route::controller(TestimonialController::class)
        ->prefix('testimonial')
        ->name('testimonial.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{slider}', 'edit')->name('edit');
            Route::post('/edit/{slider}', 'update')->name('update');
            Route::post('/delete/{slider}', 'delete')->name('delete');
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

    Route::controller(MenuController::class)
        ->prefix('menu')
        ->name('menu.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
        });

    Route::controller(OptionsController::class)
        ->prefix('options')
        ->name('options.')->group(function () {
            Route::get('/edit/{options}', 'edit')->name('edit');
            Route::post('/edit/{options}', 'update')->name('update');
        });

    Route::controller(QuestionController::class)
        ->prefix('question')
        ->name('question.')->group(function () {
            Route::get('/index', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/create', 'store')->name('store');
            Route::get('/edit/{question}', 'edit')->name('edit');
            Route::post('/edit/{question}', 'update')->name('update');
            Route::post('/delete/{social_icon}', 'delete')->name('delete');
        });
});

//Route::get('/', function () {
//    return view('test');
//
//    //return view('welcome');
//});
