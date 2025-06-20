<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index']);
Route::get('/event/create',[EventController::class, 'create']);

Route::get('/products', [EventController::class, 'products']);

Route::get('/product/{id?}', [EventController::class, 'product']);
