<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/product',[ProductController::class, 'index'] )-> name ('product.index');            //productindex
Route::get('/product/create',[ProductController::class, 'create'] )-> name ('product.create');   //product with data

Route::post('/product',[ProductController::class, 'store'] )-> name ('product.store');           // for form
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('product.update');

Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('product.delete');

Route::get('/product/search',[ProductController::class, 'search'] )-> name ('product.search');



