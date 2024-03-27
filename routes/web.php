<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductController;



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

Route::resource('/', ProductsController::class);

Route::get('/',[ProductController::class,'index'])->name('products.index');
Route::get('create', [ProductController::class,'create'])->name('products.create');
Route::post('store', [ProductController::class,'store'])->name('products.store');
Route::get('edit/{id}', [ProductController::class,'edit'])->name('products.edit');
Route::post('update/{id}', [ProductController::class,'update'])->name('products.update');
Route::get('delete/{id}', [ProductController::class,'delete'])->name('products.delete');
Route::get('show/{id}', [ProductController::class,'show'])->name('products.show');



