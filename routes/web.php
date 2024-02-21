<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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

Route::view('/','home');

Route::get('register', [RegisterController::class, 'register']);
Route::post('registerStore', [RegisterController::class, 'registerStore'])->name('store.register');

Route::get('demo',function(){
    return total_add_to_cart_prodcut();
});
