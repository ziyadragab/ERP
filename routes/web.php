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

Route::group([], function () {
    Route::get('', [HomeController::class, 'index'])->name('index');

    Route::group([
        'controller' => ProductController::class,
        'prefix' => 'products',
        'as' => 'product.'
    ], function () {
        Route::get('', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{product}', 'edit')->name('edit');
        Route::put('update/{product}', 'update')->name('update');
        Route::delete('delete/{product}', 'delete')->name('delete');
        Route::get('search', 'search')->name('search');

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
        Route::put('update/{customer}', 'update')->name('update');
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
        Route::put('update/{invoice}', 'update')->name('update');
        Route::get('get-customer/{customer}', 'getCustomerDetails')->name('getCustomerDetails');
        Route::delete('/{invoice}', 'delete')->name('delete');
        Route::delete('/deleteProduct/{itemCode}','deleteProduct')->name('deleteProduct');


    });
});
