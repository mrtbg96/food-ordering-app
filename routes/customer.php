<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CartController;

/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
|
| Here is where you can register customer routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "customer" middleware group. Now create something great!
|
*/

Route::group([
    'prefix'     => 'customer',
    'as'         => 'customer.',
    'middleware' => ['auth'],
], function () {
    Route::get('cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('cart/{product}/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('cart/{uuid}/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::delete('cart', [CartController::class, 'destroy'])->name('cart.destroy');
});
