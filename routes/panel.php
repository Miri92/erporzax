<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\DashboardController;
use App\Http\Controllers\Panel\DocController;

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
    Route::post('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
});


//Route::get('/', function () {
//    return view('test');
//
//    //return view('welcome');
//});
