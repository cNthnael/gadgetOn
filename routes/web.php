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
Route::post('detail/{id}', [\App\Http\Controllers\ProductController::class, 'checkout'])->name('checkout');

//Cart & Checkout
Route::get('cart/{id}', [\App\Http\Controllers\ProductController::class, 'cart'])->name('cart');
Route::delete('cart/{id}', [\App\Http\Controllers\ProductController::class, 'delete']);
Route::get('confirm-cart',[\App\Http\Controllers\ProductController::class, 'confirm']);

//History
Route::get('history', [\App\Http\Controllers\HistoryController::class, 'index'])->name('history');
Route::get('history/{id}', [\App\Http\Controllers\HistoryController::class, 'detail']);


Route::get('list', [\App\Http\Controllers\ProductController::class, 'list'])->name('list');
Route::get('create', [\App\Http\Controllers\ProductController::class, 'create'])->name('create');
Route::post('create/product', [\App\Http\Controllers\ProductController::class, 'store'])->name('store');
Route::delete('list/{id}', [\App\Http\Controllers\ProductController::class, 'destroy']);
Route::get('update/{id}', [\App\Http\Controllers\ProductController::class, 'update'])->name('edit');
Route::post('update/{id}', [\App\Http\Controllers\ProductController::class, 'update_store']);


