<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::any('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/tohome', function () {
    die('here');
});
Route::any('/article/{id}', [App\Http\Controllers\ArticleController::class, 'index']);

Route::any('/test', [App\Http\Controllers\TestController::class, 'index']);
//Route::any('/login', [App\Http\Controllers\Admin\LoginController::class, 'index']);

Route::middleware(['verified'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\Admin\DashBoardController::class, 'index']);
    Route::get('/admin/users', [App\Http\Controllers\Admin\UsersController::class, 'index']);
    Route::any('/admin/users/add', [App\Http\Controllers\Admin\UsersController::class, 'add']);
    Route::any('/admin/users/edit/{id}', [App\Http\Controllers\Admin\UsersController::class, 'edit']);
    Route::get('/admin/groups', [App\Http\Controllers\Admin\UsersController::class, 'groups']);
    Route::any('/admin/groups/add', [App\Http\Controllers\Admin\UsersController::class, 'groupsAdd']);
    Route::any('/admin/groups/edit/{id}', [App\Http\Controllers\Admin\UsersController::class, 'groupsEdit']);
    Route::any('/admin/groups/delete/{id}', [App\Http\Controllers\Admin\UsersController::class, 'groupDelete']);
    Route::get('/admin/groups/rights', [App\Http\Controllers\Admin\UsersController::class, 'rights']);

    Route::get('/admin/categories', [App\Http\Controllers\Admin\ArticleController::class, 'categories']);
    Route::any('/admin/category/add', [App\Http\Controllers\Admin\ArticleController::class, 'categoryAdd']);
    Route::any('/admin/category/edit/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'categoryEdit']);
    Route::any('/admin/category/delete/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'categoryDelete']);
    Route::any('/admin/uploadimg', [App\Http\Controllers\Admin\ArticleController::class, 'uploadImg']);

    Route::get('/admin/article', [App\Http\Controllers\Admin\ArticleController::class, 'index']);
    Route::any('/admin/article/add', [App\Http\Controllers\Admin\ArticleController::class, 'add']);
    Route::any('/admin/article/edit/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'edit']);
    Route::any('/admin/article/view/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'view']);
    Route::any('/admin/article/delete/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'delete']);
    Route::get('/admin/newsletter', [App\Http\Controllers\Admin\NewsletterController::class, 'index']);
    Route::get('/admin/newsletter/status/{id}', [App\Http\Controllers\Admin\NewsletterController::class, 'status']);
    Route::get('/admin/newsletter/delete/{id}', [App\Http\Controllers\Admin\NewsletterController::class, 'delete']);
    Route::any('/admin/profile', [App\Http\Controllers\Admin\ProfileController::class, 'index']);
});



Route::any('/newsletter', [App\Http\Controllers\NewsletterController::class, 'index']);

Route::post('/search', [App\Http\Controllers\SearchContriller::class, 'index']);
Route::get('/caregory/{id}', [App\Http\Controllers\CategoryController::class, 'index']);
Route::get('/log', function () {
    return view('auth.login');
})->name('verification.notice');

Route::get('/reset-password', function () {
    return view('frontauth.passwords.email');
})->name('front.resetpassword');


Route::any('/auth', [App\Http\Controllers\AuthController::class, 'authenticate']);
Route::any('/auth-out', [App\Http\Controllers\AuthController::class, 'logout']);



//Route::get('/email/verify', 'Auth\VerificationController@show')->name('verification.notice');


/*Route::get('/search', function () {
    $a = Article::search('description:(sdfas)')->first();
    print_r($a);
});*/
