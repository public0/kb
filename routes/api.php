<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Article;

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
/* Route::get('/articles', function () {
    return Article::all();
});

Route::get('/articles/{id}', function ($id) {
    return Article::find($id);
}); */

// Templates
Route::post(
    '/templates/open',
    [App\Http\Controllers\API\TemplatesController::class, 'open']
);
Route::get(
    '/templates/get-placeholders/{type_id}',
    [App\Http\Controllers\API\TemplatesController::class, 'getPlaceholders']
);
