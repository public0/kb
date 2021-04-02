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

Route::get('/ibd/ajax/getparamsbytype/{id}', [App\Http\Controllers\IBD\AjaxController::class, 'getParamsByType']);
Route::get('/ibd/ajax/getcalculations', [App\Http\Controllers\IBD\AjaxController::class, 'getCalculations']);
Route::get('/ibd/ajax/getcalculationbytype/{id}', [App\Http\Controllers\IBD\AjaxController::class, 'getCalculationByType']);
Route::get('/ibd/ajax/getcalculationinputtypes/{id}', [App\Http\Controllers\IBD\AjaxController::class, 'getCalculationInputTypes']);
Route::get('/ibd/ajax/getcalculationcustomparams/{id}', [App\Http\Controllers\IBD\AjaxController::class, 'getCalculationCustomParams']);
Route::get('/ibd/ajax/gettypes', [App\Http\Controllers\IBD\AjaxController::class, 'getTypes']);
Route::get('/ibd/ajax/getselecttypes', [App\Http\Controllers\IBD\AjaxController::class, 'getTypesForSelect']);
Route::get('/ibd/ajax/getselectcalcs', [App\Http\Controllers\IBD\AjaxController::class, 'getCalculationsForSelect']);
Route::get('/ibd/ajax/getparams', [App\Http\Controllers\IBD\AjaxController::class, 'getParams']);
Route::get('/ibd/ajax/getdistincttypes', [App\Http\Controllers\IBD\AjaxController::class, 'getDistinctCalcTypes']);
Route::get('/ibd/ajax/gettriggerparamsbytrigger/{id}', [App\Http\Controllers\IBD\AjaxController::class, 'getTriggerParamsByTrigger']);
Route::post('/ibd/ajax/addcalculationinput', [App\Http\Controllers\IBD\AjaxController::class, 'addCalculationInput']);
Route::post('/ibd/ajax/addcalculationparam', [App\Http\Controllers\IBD\AjaxController::class, 'addcalculationParam']);
Route::post('/ibd/ajax/updatecalculationinput/{id}', [App\Http\Controllers\IBD\AjaxController::class, 'updateCalculationInput']);
Route::post('/ibd/ajax/updatecalculationparam/{id}', [App\Http\Controllers\IBD\AjaxController::class, 'updateCalculationParam']);
Route::post('/ibd/ajax/addcalculation', [App\Http\Controllers\IBD\AjaxController::class, 'addCalculation']);
Route::post('/ibd/ajax/updatecalculation/{id}', [App\Http\Controllers\IBD\AjaxController::class, 'updateCalculation']);
Route::post('/ibd/ajax/addtrigger', [App\Http\Controllers\IBD\AjaxController::class, 'addTrigger']);
Route::post('/ibd/ajax/updatetrigger/{id}', [App\Http\Controllers\IBD\AjaxController::class, 'updateTrigger']);
Route::post('/ibd/ajax/addtriggerparam', [App\Http\Controllers\IBD\AjaxController::class, 'addTriggerParam']);
Route::post('/ibd/ajax/updatetriggerparam/{id}', [App\Http\Controllers\IBD\AjaxController::class, 'updateTriggerParam']);


Route::middleware(['verified', 'prevent-back-history','check-rights'])->group(function () {
    Route::get('/ibd', [App\Http\Controllers\IBD\DefaultController::class, 'index']);
    Route::get('/ibd/types', [App\Http\Controllers\IBD\DefaultController::class, 'index']);
    Route::get('/ibd/triggers', [App\Http\Controllers\IBD\DefaultController::class, 'triggers']);

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



Route::get('/reset-pwd', function () {
   // Config::set('auth.auth_front','true');
    return view('frontauth.passwords.email');
})->name('front.resetpassword');

/*Route::get('/reset-passworddd/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');*/

Route::any('/login', [App\Http\Controllers\AuthController::class, 'authenticate']);
Route::any('/auth-out', [App\Http\Controllers\AuthController::class, 'logout']);


Route::get('/log', function () {
    return view('frontauth.login');
})->name('verification.notice');

