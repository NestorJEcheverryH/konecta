<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categories', [App\Http\Controllers\CategoriesController::class, 'index'])->name('categories');
Route::post('/categories/store', [App\Http\Controllers\CategoriesController::class, 'store'])->name('categories.store');
Route::post('/categories/update/{categoryId}', [App\Http\Controllers\CategoriesController::class, 'update'])->name('categories.update');
Route::delete('/categories/delete/{categoryId}', [App\Http\Controllers\CategoriesController::class, 'delete'])->name('categories.delete');

Route::get('/products', [App\Http\Controllers\ProductsController::class, 'index'])->name('products');
Route::post('/products/store', [App\Http\Controllers\ProductsController::class, 'store'])->name('products.store');
Route::post('/products/update/{productId}', [App\Http\Controllers\ProductsController::class, 'update'])->name('products.update');
Route::delete('/products/delete/{productId}', [App\Http\Controllers\ProductsController::class, 'delete'])->name('products.delete');

Route::get('/sales', [App\Http\Controllers\SalesController::class, 'index'])->name('sales');
Route::post('/sales/store', [App\Http\Controllers\SalesController::class, 'store'])->name('sales.store');

