<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Staff\OrderController;

/*
|--------------------------------------------------------------------------
| Staff Routes
|--------------------------------------------------------------------------
|
| Here is where you can register staff routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "staff" middleware group. Now create something great!
|
*/

Route::group([
    'prefix'     => 'staff',
    'as'         => 'staff.',
    'middleware' => ['auth'],
], function () {
    Route::resource('orders', OrderController::class);
});
