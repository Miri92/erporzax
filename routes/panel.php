<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\SliderController;
use App\Http\Controllers\Panel\DashboardController;
use App\Http\Controllers\Panel\DocController;
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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

Route::controller(DocController::class)
    ->prefix('doc')
    ->name('doc.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{doc}', 'edit')->name('edit');

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


//Route::get('/', function () {
//    return view('test');
//
//    //return view('welcome');
//});
