<?php

use App\Http\Controllers\AppController;
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

Route::get('/', function () {
    return view('create');
});

Route::group(['prefix' => 'application'], function () {
    Route::post('/create', 'App\Http\Controllers\AppController@create');
    Route::get('/list', 'App\Http\Controllers\AppController@list');
});

