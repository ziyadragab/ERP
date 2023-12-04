<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
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

Route::group([

], function () {
    Route::get('', [HomeController::class,'index'])->name('index');

    Route::group([
        'controller' => ProductController::class,
        'prefix' => 'products',
        'as' => 'product.'
    ], function () {
        Route::get('', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{product}', 'edit')->name('edit');
        Route::delete('delete/{product}', 'delete')->name('delete');
    });
    Route::group([
        'controller' => CustomerController::class,
        'as' => 'customer.',
        'prefix' => 'customers'
    ], function () {
        Route::get('', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{customer}', 'edit')->name('edit');
        Route::delete('delete/{customer}', 'delete')->name('delete');
    });


    Route::group([
        'controller' => InvoiceController::class,
        'as' => 'invoice.',
        'prefix' => 'invoices'
    ], function () {
        Route::get('', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{invoice}', 'edit')->name('edit');
    });
});
