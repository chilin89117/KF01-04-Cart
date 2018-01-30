<?php
Auth::routes();
Route::get('/', 'ProductController@index');
Route::resource('products', 'ProductController');
Route::get('cart', 'CartController@show')->name('cart.show');
Route::get('cart/checkout', 'CartController@checkout')->name('cart.checkout');
Route::post('cart/{product}/add', 'CartController@add')->name('cart.add');
Route::get('cart/{rowId}/remove', 'CartController@remove_item')->name('cart.remove_item');
Route::get('cart/{rowId}/minusOne', 'CartController@minusOne')->name('cart.minusOne');
Route::get('cart/{rowId}/plusOne', 'CartController@plusOne')->name('cart.plusOne');
Route::post('cart/checkout', 'CartController@pay')->name('cart.pay');
