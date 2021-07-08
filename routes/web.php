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

    Route::get('/admin', [App\Http\Controllers\Admin\DashBoardController::class, 'index'])->name('admin.home');

    Route::get('/ibd', [App\Http\Controllers\IBD\DefaultController::class, 'index'])->name('ibd.home');
    Route::get('/ibd/types', [App\Http\Controllers\IBD\DefaultController::class, 'index'])->name('ibd.types');
    Route::get('/ibd/triggers', [App\Http\Controllers\IBD\DefaultController::class, 'triggers'])->name('ibd.triggers');

    Route::get('/admin/users', [App\Http\Controllers\Admin\UsersController::class, 'index']);
    Route::any('/admin/users/add', [App\Http\Controllers\Admin\UsersController::class, 'add']);
    Route::any('/admin/users/edit/{id}', [App\Http\Controllers\Admin\UsersController::class, 'edit']);
    Route::any('/admin/users/status/{id}', [App\Http\Controllers\Admin\UsersController::class, 'status']);
    Route::any('/admin/users/password-reset/{id}', [App\Http\Controllers\Admin\UsersController::class, 'passwordReset']);
    // TODO: Delete all groups methods
    Route::get('/admin/groups', [App\Http\Controllers\Admin\UsersController::class, 'groups']);
    Route::any('/admin/groups/add', [App\Http\Controllers\Admin\UsersController::class, 'groupAdd']);
    Route::any('/admin/groups/edit/{id}', [App\Http\Controllers\Admin\UsersController::class, 'groupEdit']);
    Route::any('/admin/groups/delete/{id}', [App\Http\Controllers\Admin\UsersController::class, 'groupDelete']);
    Route::any('/admin/groups/status/{id}', [App\Http\Controllers\Admin\UsersController::class, 'groupStatus']);

    Route::get('/admin/categories', [App\Http\Controllers\Admin\ArticleController::class, 'categories']);
    Route::any('/admin/category/add', [App\Http\Controllers\Admin\ArticleController::class, 'categoryAdd']);
    Route::any('/admin/category/edit/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'categoryEdit']);
    Route::any('/admin/category/delete/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'categoryDelete']);
    Route::get('/admin/category/status/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'categoryStatus']);
    Route::any('/admin/upload-image', [App\Http\Controllers\Admin\ArticleController::class, 'uploadImage']);

    Route::get('/admin/article', [App\Http\Controllers\Admin\ArticleController::class, 'index']);
    Route::any('/admin/article/add', [App\Http\Controllers\Admin\ArticleController::class, 'add']);
    Route::any('/admin/article/edit/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'edit']);
    Route::any('/admin/article/delete/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'delete']);
    Route::get('/admin/article/status/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'status']);
    Route::get('/admin/article/right-col/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'rightCol']);
    // Comments
    Route::get('/admin/comments', [App\Http\Controllers\Admin\CommentsController::class, 'index']);
    Route::get('/admin/comments/status/{id}', [App\Http\Controllers\Admin\CommentsController::class, 'status']);
    Route::get('/admin/comments/delete/{id}', [App\Http\Controllers\Admin\CommentsController::class, 'delete']);
    // Article Files
    Route::get('/admin/files', [App\Http\Controllers\Admin\FilesController::class, 'index']);
    Route::any('/admin/files/add', [App\Http\Controllers\Admin\FilesController::class, 'add']);
    Route::get('/admin/files/delete/{file}', [App\Http\Controllers\Admin\FilesController::class, 'delete']);
    // Import
    Route::any('/admin/import/{type}', [App\Http\Controllers\Admin\ImportController::class, 'index']);
    // Newsletter
    Route::get('/admin/newsletter', [App\Http\Controllers\Admin\NewsletterController::class, 'index']);
    Route::get('/admin/newsletter/status/{id}', [App\Http\Controllers\Admin\NewsletterController::class, 'status']);
    Route::get('/admin/newsletter/delete/{id}', [App\Http\Controllers\Admin\NewsletterController::class, 'delete']);
    // User Profile
    Route::any('/admin/profile', [App\Http\Controllers\Admin\ProfileController::class, 'index']);
    // Localization
    Route::get(
        '/admin/localization',
        [App\Http\Controllers\Admin\LocalizationController::class, 'index']
    )->name('admin.localization');
    Route::any(
        '/admin/localization/generate',
        [App\Http\Controllers\Admin\LocalizationController::class, 'generate']
    )->name('admin.localization.generate');
    Route::any(
        '/admin/localization/add',
        [App\Http\Controllers\Admin\LocalizationController::class, 'add']
    )->name('admin.localization.add');
    Route::any(
        '/admin/localization/edit/{id}',
        [App\Http\Controllers\Admin\LocalizationController::class, 'edit']
    )->name('admin.localization.edit');
    Route::get(
        '/admin/localization/delete/{id}',
        [App\Http\Controllers\Admin\LocalizationController::class, 'delete']
    )->name('admin.localization.delete');
    // Templates Admin Interface
    Route::get(
        '/admin/templates-types',
        [App\Http\Controllers\Admin\TemplatesTypesController::class, 'index']
    )->name('admin.tpl.types');
    Route::any(
        '/admin/templates-types/add-type',
        [App\Http\Controllers\Admin\TemplatesTypesController::class, 'addType']
    )->name('admin.tpl.types.add');
    Route::any(
        '/admin/templates-types/edit-type/{id}',
        [App\Http\Controllers\Admin\TemplatesTypesController::class, 'editType']
    )->name('admin.tpl.types.edit');
    /* Route::get(
        '/admin/templates-types/delete-type/{id}',
        [App\Http\Controllers\Admin\TemplatesTypesController::class, 'deleteType']
    )->name('admin.tpl.types.delete'); */
    Route::get(
        '/admin/templates-types/status-type/{id}',
        [App\Http\Controllers\Admin\TemplatesTypesController::class, 'statusType']
    )->name('admin.tpl.types.status');

    Route::get(
        '/admin/templates-types/subtypes/{tid}',
        [App\Http\Controllers\Admin\TemplatesTypesController::class, 'subtypes']
    )->name('admin.tpl.subtypes');
    Route::any(
        '/admin/templates-types/subtypes/{tid}/add-subtype',
        [App\Http\Controllers\Admin\TemplatesTypesController::class, 'addSubtype']
    )->name('admin.tpl.subtypes.add');
    Route::any(
        '/admin/templates-types/subtypes/{tid}/edit-subtype/{id}',
        [App\Http\Controllers\Admin\TemplatesTypesController::class, 'editSubtype']
    )->name('admin.tpl.subtypes.edit');
    /* Route::get(
        '/admin/templates-types/subtypes/{tid}/delete-subtype/{id}',
        [App\Http\Controllers\Admin\TemplatesTypesController::class, 'deleteSubtype']
    )->name('admin.tpl.subtypes.delete'); */
    Route::get(
        '/admin/templates-types/subtypes/{tid}/status-subtype/{id}',
        [App\Http\Controllers\Admin\TemplatesTypesController::class, 'statusSubtype']
    )->name('admin.tpl.subtypes.status');

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
    // Swag Admin Interface
    Route::get(
        '/admin/swag-documents',
        [App\Http\Controllers\Admin\SwagDocumentsController::class, 'index']
    )->name('admin.swag.documents');
    Route::any(
        '/admin/swag-documents/add-document',
        [App\Http\Controllers\Admin\SwagDocumentsController::class, 'addDocument']
    )->name('admin.swag.documents.add');
    Route::any(
        '/admin/swag-documents/edit-document/{id}',
        [App\Http\Controllers\Admin\SwagDocumentsController::class, 'editDocument']
    )->name('admin.swag.documents.edit');
    Route::get(
        '/admin/swag-documents/delete-document/{id}',
        [App\Http\Controllers\Admin\SwagDocumentsController::class, 'deleteDocument']
    )->name('admin.swag.documents.delete');
    Route::post(
        '/admin/swag-documents/upload-image',
        [App\Http\Controllers\Admin\SwagDocumentsController::class, 'uploadImage']
    )->name('admin.swag.documents.uploadimage');
    Route::get(
        '/admin/swag-documents/groups/{docid}',
        [App\Http\Controllers\Admin\SwagDocumentsController::class, 'groups']
    )->name('admin.swag.groups');
    Route::any(
        '/admin/swag-documents/groups/{docid}/add-group',
        [App\Http\Controllers\Admin\SwagDocumentsController::class, 'addGroup']
    )->name('admin.swag.groups.add');
    Route::any(
        '/admin/swag-documents/groups/{docid}/edit-group/{id}',
        [App\Http\Controllers\Admin\SwagDocumentsController::class, 'editGroup']
    )->name('admin.swag.groups.edit');
    Route::get(
        '/admin/swag-documents/groups/{docid}/delete-group/{id}',
        [App\Http\Controllers\Admin\SwagDocumentsController::class, 'deleteGroup']
    )->name('admin.swag.groups.delete');
    Route::get(
        '/admin/swag-documents/groups/{docid}/status-group/{id}',
        [App\Http\Controllers\Admin\SwagDocumentsController::class, 'statusGroup']
    )->name('admin.swag.groups.status');
    Route::get(
        '/admin/swag-documents/groups/{docid}/methods/{gid}',
        [App\Http\Controllers\Admin\SwagDocumentsController::class, 'methods']
    )->name('admin.swag.methods');
    Route::any(
        '/admin/swag-documents/groups/{docid}/methods/{gid}/add-method',
        [App\Http\Controllers\Admin\SwagDocumentsController::class, 'addMethod']
    )->name('admin.swag.methods.add');
    Route::any(
        '/admin/swag-documents/groups/{docid}/methods/{gid}/edit-method/{id}',
        [App\Http\Controllers\Admin\SwagDocumentsController::class, 'editMethod']
    )->name('admin.swag.methods.edit');
    Route::get(
        '/admin/swag-documents/groups/{docid}/methods/{gid}/delete-method/{id}',
        [App\Http\Controllers\Admin\SwagDocumentsController::class, 'deleteMethod']
    )->name('admin.swag.methods.delete');
    Route::get(
        '/admin/swag-documents/groups/{docid}/methods/{gid}/status-method/{id}',
        [App\Http\Controllers\Admin\SwagDocumentsController::class, 'statusMethod']
    )->name('admin.swag.methods.status');
    Route::any(
        '/admin/swag-documents/groups/{docid}/methods/{gid}/move-method/{id}',
        [App\Http\Controllers\Admin\SwagDocumentsController::class, 'moveMethod']
    )->name('admin.swag.methods.move');
    Route::get(
        '/admin/swag-clients',
        [App\Http\Controllers\Admin\SwagClientsController::class, 'index']
    )->name('admin.swag.clients');
    Route::any(
        '/admin/swag-clients/add',
        [App\Http\Controllers\Admin\SwagClientsController::class, 'add']
    )->name('admin.swag.clients.add');
    Route::any(
        '/admin/swag-clients/edit/{id}',
        [App\Http\Controllers\Admin\SwagClientsController::class, 'edit']
    )->name('admin.swag.clients.edit');
    Route::get(
        '/admin/swag-clients/delete/{id}',
        [App\Http\Controllers\Admin\SwagClientsController::class, 'delete']
    )->name('admin.swag.clients.delete');
});

// Template (no auth)
Route::name('tpl.')->group(function () {
    Route::any(
        '/templates/open/{uid}',
        [App\Http\Controllers\Tpl\TemplatesController::class, 'open']
    )->name('open');
    Route::post(
        '/templates/upload-image',
        [App\Http\Controllers\Tpl\TemplatesController::class, 'uploadImage']
    )->name('uploadimage');
    Route::get(
        '/templates/delete-image/{uid}/{field}/{image}',
        [App\Http\Controllers\Tpl\TemplatesController::class, 'deleteImage']
    )->name('deleteimage');
});

// Procesio (req key)
Route::name('procesio.')->group(function () {
    Route::any(
        '/procesio',
        [App\Http\Controllers\Procesio\ProcesioController::class, 'index']
    )->name('home');
    Route::any(
        '/procesio/search',
        [App\Http\Controllers\Procesio\ProcesioController::class, 'search']
    )->name('search');
    Route::any(
        '/procesio/partners/edit/{id}',
        [App\Http\Controllers\Procesio\ProcesioController::class, 'partnersEdit']
    )->name('partners.edit');
});

// Swag
Route::name('swag.')->group(function () {
    Route::get(
        '/swag',
        [App\Http\Controllers\Swag\DocumentsController::class, 'index']
    )->name('home');
    Route::get(
        '/swag/search',
        [App\Http\Controllers\Swag\DocumentsController::class, 'search']
    )->name('search');
    Route::get(
        '/swag/{slug}',
        [App\Http\Controllers\Swag\DocumentsController::class, 'document']
    )->name('document');
});

// Frontend
Route::name('front.')->group(function () {
    // Articles
    Route::get(
        '/category/{id}',
        [App\Http\Controllers\CategoryController::class, 'index']
    )->name('category');
    Route::any(
        '/article/{id}',
        [App\Http\Controllers\ArticleController::class, 'index']
    )->name('article');
    Route::get(
        '/search',
        [App\Http\Controllers\SearchController::class, 'index']
    )->name('search');
    // Newsletter
    Route::any(
        '/newsletter',
        [App\Http\Controllers\NewsletterController::class, 'index']
    )->name('newsletter');
});

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
    Route::any(
        '/password-reset',
        [App\Http\Controllers\AuthController::class, 'passwordReset']
    )->name('password.reset');
});

// API Token
Route::middleware(['api_token'])->group(function () {
    Route::name('help.')->group(function () {
        Route::get(
            '/help/{api_token}/article/view/{id}',
            [App\Http\Controllers\ArticleController::class, 'helpView']
        )->name('articles.view');
        Route::get(
            '/help/{api_token}/search',
            [App\Http\Controllers\SearchController::class, 'helpSearch']
        )->name('articles.search');
    });
});
