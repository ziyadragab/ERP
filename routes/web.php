<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;

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
    'controller'=>StoreController::class,
    'as'=>'store.'
],function(){
    Route::get('','index')->name('index');
    Route::get('create','create')->name('create');
    Route::post('store','store')->name('store');
    Route::get('edit/{store}','edit')->name('edit');

});


Route::group([
    'controller'=>InvoiceController::class,
    'as'=>'invoice.',
    'prefix'=>'invoices'
],function(){
    Route::get('','index')->name('index');
    Route::get('create','create')->name('create');
    Route::post('store','store')->name('store');
    Route::get('edit/{invoice}','edit')->name('edit');


});