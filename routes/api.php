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
