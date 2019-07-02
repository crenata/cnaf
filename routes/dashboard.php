<?php
Route::resource('vendor', 'VendorController');
Route::resource('brand', 'BrandController');
Route::resource('item', 'ItemController');
Route::resource('blog', 'BlogController');
Route::resource('carregion', 'CarRegionController');
Route::resource('carbrand', 'CarBrandController');
Route::resource('cartype', 'CarTypeController');
Route::resource('carmodel', 'CarModelController');
Route::resource('caryear', 'CarYearController');
Route::resource('flatrate', 'FlatRateController');
Route::get('item/brand/{id}', 'ItemController@brandByVendor')->name('item.brandbyvendor');