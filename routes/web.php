<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;

Route::get('/', [SiteController::class, 'home']);
Route::get('/product/create', [ProductController::class, 'create']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products', [ProductController::class, 'index']); 
Route::get('/product/{id}', [ProductController::class, 'show']);
