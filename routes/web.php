<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

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

Route::any('/', [App\Http\Controllers\HomeController::class, 'index'])->name('front.home');
// Route::any('/test', [App\Http\Controllers\TestController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\Admin\DashBoardController::class, 'index'])->name('admin.home');
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
    Route::any('/admin/upload-image', [App\Http\Controllers\Admin\ArticleController::class, 'uploadImage']);
    Route::any('/admin/import-images', [App\Http\Controllers\Admin\ArticleController::class, 'importImages']);

    Route::get('/admin/article', [App\Http\Controllers\Admin\ArticleController::class, 'index']);
    Route::any('/admin/article/add', [App\Http\Controllers\Admin\ArticleController::class, 'add']);
    Route::any('/admin/article/edit/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'edit']);
    Route::any('/admin/article/delete/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'delete']);
    Route::get('/admin/article/status/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'status']);
    // Comments
    Route::get('/admin/comments', [App\Http\Controllers\Admin\CommentsController::class, 'index']);
    Route::get('/admin/comments/status/{id}', [App\Http\Controllers\Admin\CommentsController::class, 'status']);
    Route::get('/admin/comments/delete/{id}', [App\Http\Controllers\Admin\CommentsController::class, 'delete']);
    // Newsletter
    Route::get('/admin/newsletter', [App\Http\Controllers\Admin\NewsletterController::class, 'index']);
    Route::get('/admin/newsletter/status/{id}', [App\Http\Controllers\Admin\NewsletterController::class, 'status']);
    Route::get('/admin/newsletter/delete/{id}', [App\Http\Controllers\Admin\NewsletterController::class, 'delete']);
    // User Profile
    Route::any('/admin/profile', [App\Http\Controllers\Admin\ProfileController::class, 'index']);
    // Templates Admin Interface
    Route::get(
        '/admin/templates-types',
        [App\Http\Controllers\Admin\TemplatesTypesController::class, 'index']
    )->name('admin.tpl.types');
    Route::any(
        '/admin/templates-types/add',
        [App\Http\Controllers\Admin\TemplatesTypesController::class, 'add']
    )->name('admin.tpl.types.add');
    Route::any(
        '/admin/templates-types/edit/{id}',
        [App\Http\Controllers\Admin\TemplatesTypesController::class, 'edit']
    )->name('admin.tpl.types.edit');
    Route::get(
        '/admin/templates-types/delete/{id}',
        [App\Http\Controllers\Admin\TemplatesTypesController::class, 'delete']
    )->name('admin.tpl.types.delete');
    Route::get(
        '/admin/templates-types/status/{id}',
        [App\Http\Controllers\Admin\TemplatesTypesController::class, 'status']
    )->name('admin.tpl.types.status');

    Route::get(
        '/admin/templates-placeholders',
        [App\Http\Controllers\Admin\TemplatePlaceholdersController::class, 'index']
    )->name('admin.tpl.place.group');
    Route::any(
        '/admin/templates-placeholders/add-group',
        [App\Http\Controllers\Admin\TemplatePlaceholdersController::class, 'addGroup']
    )->name('admin.tpl.place.group.add');
    Route::any(
        '/admin/templates-placeholders/edit-group/{id}',
        [App\Http\Controllers\Admin\TemplatePlaceholdersController::class, 'editGroup']
    )->name('admin.tpl.place.group.edit');
    Route::get(
        '/admin/templates-placeholders/delete-group/{id}',
        [App\Http\Controllers\Admin\TemplatePlaceholdersController::class, 'deleteGroup']
    )->name('admin.tpl.place.group.delete');
    Route::get(
        '/admin/templates-placeholders/status-group/{id}',
        [App\Http\Controllers\Admin\TemplatePlaceholdersController::class, 'statusGroup']
    )->name('admin.tpl.place.group.status');

    Route::get(
        '/admin/templates-placeholders/placeholders/{gid}',
        [App\Http\Controllers\Admin\TemplatePlaceholdersController::class, 'placeholders']
    )->name('admin.tpl.places');
    Route::any(
        '/admin/templates-placeholders/placeholders/{gid}/add-placeholder',
        [App\Http\Controllers\Admin\TemplatePlaceholdersController::class, 'addPlaceholder']
    )->name('admin.tpl.places.add');
    Route::any(
        '/admin/templates-placeholders/placeholders/{gid}/edit-placeholder/{id}',
        [App\Http\Controllers\Admin\TemplatePlaceholdersController::class, 'editPlaceholder']
    )->name('admin.tpl.places.edit');
    Route::get(
        '/admin/templates-placeholders/placeholders/{gid}/delete-placeholder/{id}',
        [App\Http\Controllers\Admin\TemplatePlaceholdersController::class, 'deletePlaceholder']
    )->name('admin.tpl.places.delete');
    Route::get(
        '/admin/templates-placeholders/placeholders/{gid}/status-placeholder/{id}',
        [App\Http\Controllers\Admin\TemplatePlaceholdersController::class, 'statusPlaceholder']
    )->name('admin.tpl.places.status');
});

// Template (no auth)
Route::any(
    '/templates/open/{uid}',
    [App\Http\Controllers\Tpl\TemplatesController::class, 'open']
)->name('tpl.open');
Route::post(
    '/templates/upload-image',
    [App\Http\Controllers\Tpl\TemplatesController::class, 'uploadImage']
)->name('tpl.uploadimage');
Route::get(
    '/templates/delete-image/{uid}/{field}/{image}',
    [App\Http\Controllers\Tpl\TemplatesController::class, 'deleteImage']
)->name('tpl.deleteimage');

// Articles
Route::get('/category/{id}', [App\Http\Controllers\CategoryController::class, 'index'])->name('front.category');
Route::any('/article/{id}', [App\Http\Controllers\ArticleController::class, 'index'])->name('front.article');
Route::get('/search', [App\Http\Controllers\SearchController::class, 'index'])->name('front.search');

// Newsletter
Route::any(
    '/newsletter',
    [App\Http\Controllers\NewsletterController::class, 'index']
)->name('front.newsletter');

// Auth
Route::name('auth.')->group(function () {
    Route::any(
        '/login',
        [App\Http\Controllers\AuthController::class, 'authenticate']
    )->name('login');
    Route::any(
        '/logout',
        [App\Http\Controllers\AuthController::class, 'logout']
    )->name('logout');
});

// API Token
Route::middleware(['api_token'])->group(function () {
    Route::get(
        '/help/{api_token}/article/view/{id}',
        [App\Http\Controllers\ArticleController::class, 'helpView']
    )->name('help.articles.view');
    Route::get(
        '/help/{api_token}/search',
        [App\Http\Controllers\SearchController::class, 'helpSearch']
    )->name('help.articles.search');
});
