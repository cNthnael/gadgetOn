 <?php

use Illuminate\Support\Facades\Route;


Auth::routes();

//Landing Page
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Profile
Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'index']);
Route::post('profile', [\App\Http\Controllers\ProfileController::class, 'edit']);

//Product Detail
Route::get('detail/{id}', [\App\Http\Controllers\DetailController::class, 'index'])->name('detail.view');
Route::post('detail/{id}', [\App\Http\Controllers\ProductController::class, 'checkout']);

//Cart & Checkout
Route::get('cart', [\App\Http\Controllers\ProductController::class, 'cart']);
Route::delete('cart/{id}', [\App\Http\Controllers\ProductController::class, 'delete']);
Route::get('confirm-cart',[\App\Http\Controllers\ProductController::class, 'confirm']);

//History
Route::get('history', [\App\Http\Controllers\HistoryController::class, 'index']);

//Admin
Route::get('create', [\App\Http\Controllers\ProductController::class, 'create'])->name('create');
Route::get('update', [\App\Http\Controllers\ProductController::class, 'update'])->name('update');

