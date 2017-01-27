<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'api', 'middleware' => ['auth.once', 'auth']], function (){
    Route::get('/subscriptions', 'SubscriptionController@index')->name('subscriptions.index');
    Route::post('/subscriptions', 'SubscriptionController@create')->name('subscriptions.create');
    Route::get('/subscriptions/count', 'SubscriptionController@count')->name('subscriptions.count');
    Route::get('/subscriptions/{subscription}', 'SubscriptionController@show')->name('subscriptions.show');

    Route::get('/subscriptions/{subscription}/payments', 'PaymentController@index')->name('payment.index');
    Route::post('/subscriptions/{subscription}/payments', 'PaymentController@create')->name('payment.create');
    Route::get('/subscriptions/{subscription}/payments/{payment}', 'PaymentController@show')->name('payment.show');

    Route::get('/countries', 'PriceListController@index');
    Route::get('/price-list/{tariffId}/{countryCode?}', 'PriceListController@priceList');

});


Route::get('/', function () {
    return view('welcome');
});
