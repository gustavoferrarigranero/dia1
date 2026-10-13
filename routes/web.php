<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

Route::get('/', [ ProductController::class, 'index' ])->name('products.index');

Route::get('/create', [ ProductController::class, 'create' ])->name('products.create');
Route::post('/create', [ ProductController::class, 'store' ])->name('products.store');

Route::get('/show/{product}', [ ProductController::class, 'show' ])->name('products.show');