<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FrontController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\Front\AddToCartController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {

   Route::get('/',[FrontController::class,'index']);
    Route::get('add-to-card/{id}',[AddToCartController::class,'addtoCart'])->name('addtocart');

    // admin login
    Route::get('admin-login', [LoginController::class, 'login'])->name('admin.login');
    Route::post('login', [LoginController::class, 'storeLogin']);


    Route::middleware(['auth','admin'])->name('admin.')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('product', ProductController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('brand', BrandController::class);

    });


    //user login
    Route::get('user-register',[UserController::class,'index']);
    Route::post('user-register',[UserController::class,'userRegister']);

    Route::get('user-login',[UserController::class,'login'])->name('login');
    Route::post('user-login',[UserController::class,'loginStore']);

    Route::middleware('auth')->group(function(){
        Route::get('logout',[UserController::class,'logout']);
    });


});
