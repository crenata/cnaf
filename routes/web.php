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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('articles', 'HomeController@articles')->name('articles');
Route::get('simulasi', 'HomeController@simulasi')->name('simulasi');
Route::get('tentang-kami', 'HomeController@tentangkami')->name('tentangkami');
Route::get('faq', 'HomeController@faq')->name('faq');
Route::get('privacy-policy', 'HomeController@privacypolicy')->name('privacy.policy');
Route::get('terms-and-condition', 'HomeController@termsandcondition')->name('terms.and.condition');
Route::get('shop', 'HomeController@shop')->name('shop');
Route::get('shop/{slug}', 'HomeController@shopVendorDetails')->name('shop.vendor.show');
Route::get('shop/{slug}/{slugbrand}', 'HomeController@products')->name('products');
Route::get('shop/{slug}/{slugbrand}/{slugitem}', 'HomeController@itemDetail')->name('item.detail');