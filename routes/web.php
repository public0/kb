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

Route::get('/test', [App\Http\Controllers\TestController::class, 'index']);
Route::get('/login', [App\Http\Controllers\Admin\LoginController::class, 'index']);
Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashBoardController::class, 'index']);
