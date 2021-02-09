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
Route::get('articles', function() {
    return Article::all();
});

Route::get('articles/{id}', function($id) {
    return Article::find($id);
});

/*Route::get('/article/{api_token}/{id}', function (Request $request) {
    return response()->json([
        'name' => $request->id,
    ]);
})->middleware('api_token');

Route::get('/relevant-article/{api_token}/', function (Request $request) {
    return response()->json([
        'name' => $request->id,
    ]);
})->middleware('api_token');*/

Route::get('/article/{api_token}/{id}', [App\Http\Controllers\API\ServiceController::class, 'getArticle'])->middleware('api_token');

Route::any('/relevant-article/{api_token}/', [App\Http\Controllers\API\ServiceController::class, 'searchArticle'])->middleware('api_token');

