<?php

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

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('articles', 'HomeController@articles')->name('articles');
Route::get('simulasi', 'HomeController@simulasi')->name('simulasi');
Route::post('simulasi', 'HomeController@simulasiFromHome')->name('simulasi.from.home');
Route::get('tentang-kami', 'HomeController@tentangkami')->name('tentangkami');

Route::get('contact', 'HomeController@contact')->name('contact');
Route::get('faq', 'HomeController@faq')->name('faq');
Route::get('privacy-policy', 'HomeController@privacypolicy')->name('privacy.policy');
Route::get('terms-and-condition', 'HomeController@termsandcondition')->name('terms.and.condition');
Route::get('how-to-shop', 'HomeController@howToShop')->name('how.to.shop');

Route::get('shop', 'HomeController@shop')->name('shop');
Route::get('shop/login', 'HomeController@shopLogin')->name('shop.login');
Route::get('shop/{slug}', 'HomeController@shopVendorDetails')->name('shop.vendor.show');
Route::get('shop/{slug}/{slugbrand}', 'HomeController@products')->name('products');
Route::get('shop/{slug}/{slugbrand}/{slugitem}', 'HomeController@itemDetail')->name('item.detail');

Route::get('simulasi/carbrand/{id}', 'HomeController@carBrandByCarRegion')->name('simulasi.carbrand.by.carregion');
Route::get('simulasi/cartype/{id}', 'HomeController@carTypeByCarBrand')->name('simulasi.cartype.by.carbrand');
Route::get('simulasi/carmodel/{id}', 'HomeController@carModelByCarType')->name('simulasi.carmodel.by.cartype');
Route::get('simulasi/caryear/{id}', 'HomeController@carYearByCarModel')->name('simulasi.caryear.by.carmodel');
Route::get('simulasi/flatrate/{id}', 'HomeController@flatRateByCarRegion')->name('simulasi.flatrate.by.carregion');
Route::get('simulasi/assurancetype', 'HomeController@getAssuranceType')->name('simulasi.get.assurancetype');
Route::get('simulasi/assurancerate/{id}/{assurancetypeid}', 'HomeController@assuranceRateByCarRegionAndAssuranceType')->name('simulasi.get.assurancerate');

/* Apply */
Route::post('apply-start', 'User\LeasingController@start')->name('apply.start');
Route::any('apply/{step}/{code}', 'User\LeasingController@apply')->name('apply');
Route::any('apply/success', 'User\LeasingController@success')->name('apply.success');

/* Testing */
Route::get('maps', 'HomeController@maps')->name('maps');
Route::get('priceterbilang', 'HomeController@priceterbilang')->name('priceterbilang');
Route::get('invoice', 'HomeController@invoice')->name('invoice');

Route::middleware(array('web', 'auth', 'verified'))->group(function () {
    Route::get('account', 'HomeController@account')->name('account');
});