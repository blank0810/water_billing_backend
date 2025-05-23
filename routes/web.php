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

// Authentication Routes
// Route::post('/api/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
// Route::post('/api/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

// Route::get('/api/login', function () {
//     return view('welcome');
// });
