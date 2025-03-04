<?php

Route::get('/', 'LandingPageController@index')->name('landing-page');
//Route::get('/terms', 'LandingPageController@terms')->name('terms');

Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart/{product}', 'CartController@store')->name('cart.store');
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');

Route::delete('/saveForLater/{product}', 'SaveForLaterController@destroy')->name('saveForLater.destroy');
Route::post('/saveForLater/switchToCart/{product}', 'SaveForLaterController@switchToCart')->name('saveForLater.switchToCart');

Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
Route::post('/checkout/success', 'CheckoutController@success')->name('checkout.success');

Route::post('/paypal-checkout', 'CheckoutController@paypalCheckout')->name('checkout.paypal');

Route::get('/guestCheckout', 'CheckoutController@index')->name('guestCheckout.index');


Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/downloads/{hash}', 'HomeController@downloads')->name('downloads');

Route::get('/search', 'ShopController@search')->name('search');

Route::get('/search-algolia', 'ShopController@searchAlgolia')->name('search-algolia');

Route::get('/view_news', 'PostsController@news')->name('view_news');


Route::middleware('auth')->group(function () {
    Route::get('/my-profile', 'UsersController@edit')->name('users.edit');
    Route::patch('/my-profile', 'UsersController@update')->name('users.update');

    Route::get('/my-orders', 'OrdersController@index')->name('orders.index');
    Route::get('/my-orders/{order}', 'OrdersController@show')->name('orders.show');
});
// Catch all page controller (place at the very bottom)
Route::get('/page/{slug}', [
	'uses' => 'PagesController@getPage'
])->where('slug', '([A-Za-z0-9\-\/]+)');
// Catch all page controller (place at the very bottom)
Route::get('/view_post/{slug}', [
	'uses' => 'PostsController@viewPost'
])->where('slug', '([A-Za-z0-9\-\/]+)');

Route::get('/post/{slug}', [
	'uses' => 'PostsController@getPost'
])->where('slug', '([A-Za-z0-9\-\/]+)');


