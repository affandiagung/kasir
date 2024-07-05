<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('', function () {
    return view('welcome');
});

Route::group(['middleware' => 'isAdmin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');

    // products
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);

    // pos
    Route::get('pos', [\App\Http\Controllers\Admin\PosController::class, 'index'])->name('pos.index');

    // transaction
    Route::get('transactions', [\App\Http\Controllers\Admin\TransactionController::class, 'index'])->name('transactions.index');
    Route::get('transactions/{transaction}/print_struck', [\App\Http\Controllers\Admin\TransactionController::class, 'print_struck'])->name('transactions.print_struck');
    Route::post('transactions', [\App\Http\Controllers\Admin\TransactionController::class, 'store'])->name('transactions.store');
    Route::get('transactions/{transaction}', [\App\Http\Controllers\Admin\TransactionController::class, 'show'])->name('transactions.show');
});

Auth::routes();
