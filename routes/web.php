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

Route::any('/test', [App\Http\Controllers\TestController::class, 'index']);
Route::any('/login', [App\Http\Controllers\Admin\LoginController::class, 'index']);
Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashBoardController::class, 'index']);
Route::get('/admin/users', [App\Http\Controllers\Admin\UsersController::class, 'index']);
Route::any('/admin/users/add', [App\Http\Controllers\Admin\UsersController::class, 'add']);
Route::any('/admin/users/edit/{id}', [App\Http\Controllers\Admin\UsersController::class, 'edit']);

Route::get('/admin/groups', [App\Http\Controllers\Admin\UsersController::class, 'groups']);
Route::any('/admin/groups/add', [App\Http\Controllers\Admin\UsersController::class, 'groupsAdd']);
Route::any('/admin/groups/edit/{id}', [App\Http\Controllers\Admin\UsersController::class, 'groupsEdit']);
