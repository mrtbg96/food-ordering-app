<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vendor\MenuController;

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
});

require __DIR__ . '/auth.php';
