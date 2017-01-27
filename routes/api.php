<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/subscriptions', 'SubscriptionController@index')->name('subscriptions.index');
Route::post('/subscriptions', 'SubscriptionController@create')->name('subscriptions.create');
Route::get('/subscriptions/count', 'SubscriptionController@count')->name('subscriptions.count');
Route::get('/subscriptions/{subscription}', 'SubscriptionController@show')->name('subscriptions.show');

Route::get('/subscriptions/{subscription}/payments', 'PaymentController@index')->name('payment.index');
Route::post('/subscriptions/{subscription}/payments', 'PaymentController@create')->name('payment.create');
Route::get('/subscriptions/{subscription}/payments/{payment}', 'PaymentController@show')->name('payment.show');

Route::get('/countries', 'PriceListController@index');
Route::get('/price-list/{tariffId}/{countryCode?}', 'PriceListController@priceList');
