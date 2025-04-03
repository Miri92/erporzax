<?php

//use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\Front\Profile\ProfileController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\ParagraphController;
use App\Http\Controllers\Front\LawCommentController;
use App\Http\Controllers\ProductPurchaseController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact.index');
Route::get('/page/{slug}', [PageController::class, 'show'])->name('page.show');

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
});


require __DIR__.'/auth.php';
