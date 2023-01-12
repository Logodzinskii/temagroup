<?php

use Illuminate\Support\Facades\Route;
use App\Models\Pages;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CalculateContentController;
use App\Http\Controllers\OrderForm;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UsersControllers;
use App\Http\Controllers\UsersOrders;
use App\Http\Controllers\ControllerYml;
use App\Models\Descryptions;
use App\Http\Controllers\CompleteProjectController;
use App\Http\Controllers\DescryptionsController;
use App\Http\Controllers\Offers;
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



/*foreach (Pages::all() as $page)
{
    Route::get($page->pageRoutName, [$page->pageMetaName, $page->pageAction]);
}*/

Route::get('/',[\App\Http\Controllers\CatalogController::class, 'index']);

Route::get('/admin/',[AdminController::class, 'index'])->middleware('auth');

Route::post('order/user/store', [OrderForm::class, 'orderUserStore'])->name('order.user.store');

Route::post('ajax/data/resp', [CalculateContentController::class, 'ajaxDataResp'])->name('ajax.data.resp');

Route::post('add/facades/price', [AdminController::class, 'addFacadesPrice'])->name('add.facades.price');
Route::get('delete/facades/price/{id}/', [AdminController::class, 'deleteFacadesPrice']);
Route::post('update/facades/price', [AdminController::class, 'updateFacadesPrice'])->name('update.facades.price');

Route::post('update/Price/FacadesBoxModules', [CalculateContentController::class, 'updatePriceFacadesBoxModules'])->name('update.price.facadesBoxModules');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/cart/{id}', [OrderForm::class, 'showDetailOrder'])->middleware('auth');
Route::get('/admin/kitchen/edit/', [AdminController::class, 'editFacadesPrice'])->middleware('auth');
Route::get('/admin/offers/edit/', [\App\Http\Controllers\CatalogController::class, 'listOffers'])->middleware('auth');
Route::post('/admin/offers/edit/', [\App\Http\Controllers\CatalogController::class, 'create'])->middleware('auth');
Route::delete('/admin/offers/edit/', [\App\Http\Controllers\CatalogController::class, 'deleteOffer'])->middleware('auth');
Route::put('/admin/offers/edit/', [\App\Http\Controllers\CatalogController::class, 'updateOffer'])->middleware('auth');
Route::get('/admin/offer/add/', [\App\Http\Controllers\CatalogController::class, 'formAddOffer'])->middleware('auth');
Route::get('/admin/offer/add/{article}', [\App\Http\Controllers\CatalogController::class, 'formUpdateOffer'])->middleware('auth');

/**
 * Маршрут для контента страницы
 */
Route::get('/admin/content/edit/', [DescryptionsController::class, 'indexDescryptions'])->middleware('auth');
Route::post('/admin/content/create/', [DescryptionsController::class, 'createDescryption'])->middleware('auth')->name('create.descryption.page');
Route::delete('/admin/content/delete/',[DescryptionsController::class, 'deleteDescryption'])->middleware('auth');
Route::put('/admin/content/edit/',[DescryptionsController::class, 'updateDescryption'])->middleware('auth')->name('update.descryption.page');


Route::get('/catalog/{article}', [\App\Http\Controllers\CatalogController::class, 'store']);

Route::get('/calculate/{model}', [CalculateContentController::class, 'showKitchen']);

Route::get('/contacts/', function () {
    $desryptions = Descryptions::firstWhere('page','=','/contacts/');
    return view('contacts', ['descryptions'=>$desryptions]);
});

Route::get('/access/to/order/{code}', [OrderForm::class, 'showDetailOrder']);

Route::get('/yml/',[ControllerYml::class, 'createYml']);
/**
 * Маршруты для готовых проектов
 */
Route::get('/complete/', [CompleteProjectController::class, 'index']);
Route::get('/complete/category/{category}/', [CompleteProjectController::class, 'index']);
Route::post('/admin/add-complite-project/', [CompleteProjectController::class, 'create'])->name('create.complete.project')->middleware('auth');
Route::get('/complete/{chpu}/', [CompleteProjectController::class, 'store']);

/**
 * Маршруты для заказа по типовому примеру
 */
Route::get('/offers/{type}/', [Offers::class,'index']);
/**
 * Политика конфиденциальности и персональных данных
 */
Route::get('/privacy/', function (){
    return view('private');
});
