<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Articles
Route::get(
    '/articles',
    [App\Http\Controllers\API\ArticlesController::class, 'list']
)->name('api.articles.list');
Route::get(
    '/articles/{id}',
    [App\Http\Controllers\API\ArticlesController::class, 'item']
)->name('api.articles.item');

// Files
Route::get(
    '/files',
    [App\Http\Controllers\API\FilesController::class, 'list']
)->name('api.files.list');

// Localization
Route::get(
    '/localization/translation',
    [App\Http\Controllers\API\LocalizationController::class, 'translation']
)->name('api.localization.translation');

// Templates
Route::post(
    '/templates/open',
    [App\Http\Controllers\API\TemplatesController::class, 'open']
);
Route::get(
    '/templates/get-placeholders/{type_id}/{subtype_id?}',
    [App\Http\Controllers\API\TemplatesController::class, 'getPlaceholders']
);
Route::get(
    '/templates/get-subtypes/{type_id?}',
    [App\Http\Controllers\API\TemplatesController::class, 'getSubtypes']
)->name('api.templates.getsubtypes');

// Swag
Route::get(
    '/swag/methods/{id}',
    [App\Http\Controllers\API\SwagController::class, 'methods']
)->name('api.swag.methods');
