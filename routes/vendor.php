<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vendor\MenuController;
use App\Http\Controllers\Vendor\CategoryController;
use App\Http\Controllers\Vendor\ProductController;
use App\Http\Controllers\Vendor\StaffMemberController;


/*
|--------------------------------------------------------------------------
| Vendor Routes
|--------------------------------------------------------------------------
|
| Here is where you can register vendor routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "vendor" middleware group. Now create something great!
|
*/

Route::group([
    'prefix'     => 'vendor',
    'as'         => 'vendor.',
    'middleware' => ['auth'],
], function () {
    Route::get('menu', [MenuController::class, 'index'])->name('menu');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('staff-members', StaffMemberController::class);
});
