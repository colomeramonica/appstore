<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

Route::get('/apps/{id}', [AppController::class, 'show'])->name('app.show');
Route::get('/apps', [AppController::class, 'index'])->name('app.index');
Route::post('/apps', [AppController::class, 'store'])->name('app.store');
 

Route::get('/category/{slug}', 'App\Http\Controllers\CategoryController@show');
Route::get('/categories', 'App\Http\Controllers\CategoryController@index'); 