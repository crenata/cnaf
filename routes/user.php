<?php
Route::resource('cart', 'CartController');
Route::resource('transaction', 'TransactionController');
Route::resource('transaction.detail', 'TransactionDetailController');
Route::resource('transaction.vendor', 'TransactionVendorController');
Route::resource('transaction.vendor.detail', 'TransactionVendorDetailController');