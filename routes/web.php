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
Route::post('detail/{id}', [\App\Http\Controllers\DetailController::class, 'checkout']);

//Cart
Route::get('cart', [\App\Http\Controllers\DetailController::class, 'cart']);
Route::delete('cart/{id}', [\App\Http\Controllers\DetailController::class, 'delete']);
Route::get('confirm-cart',[\App\Http\Controllers\DetailController::class, 'confirm']);

//History
Route::get('history', [\App\Http\Controllers\HistoryController::class, 'index']);
