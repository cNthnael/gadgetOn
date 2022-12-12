 <?php

use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'index']);
Route::post('profile', [\App\Http\Controllers\ProfileController::class, 'edit']);

Route::get('detail/{id}', [\App\Http\Controllers\DetailController::class, 'index'])->name('detail.view');
Route::post('detail/{id}', [\App\Http\Controllers\DetailController::class, 'checkout']);

Route::get('cart', [\App\Http\Controllers\DetailController::class, 'cart']);
Route::delete('cart/{id}', [\App\Http\Controllers\DetailController::class, 'delete']);
Route::get('confirm-cart',[\App\Http\Controllers\DetailController::class, 'confirm']);

 Route::get('history', [\App\Http\Controllers\HistoryController::class, 'index']);
