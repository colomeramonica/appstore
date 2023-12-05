<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/apps/{id}', [AppController::class, 'show'])->name('app.show');
Route::get('/apps', [AppController::class, 'index'])->name('apps.index');
Route::post('/apps', [AppController::class, 'store'])->name('app.create');

Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');
 
