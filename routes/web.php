<?php

use Illuminate\Support\Facades\Route;
use App\Models\Pages;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CalculateContentController;
use App\Http\Controllers\OrderForm;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UsersControllers;
use App\Http\Controllers\UsersOrders;

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
Route::get('/admin/content/edit/', [PageController::class, 'index'])->middleware('auth');
Route::delete('/admin/content/edit/',[PageController::class, 'deleteContent'])->middleware('auth');
Route::post('/admin/content/edit/',[PageController::class, 'createContent'])->middleware('auth');

Route::get('/catalog/{article}', [\App\Http\Controllers\CatalogController::class, 'store']);

Route::get('/calculate/{model}', [CalculateContentController::class, 'showKitchen']);
Route::get('/contacts/', function () {
    return view('contacts');

});

Route::get('/access/to/order/{code}', function () {
    return redirect('/');
});
