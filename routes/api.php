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
Route::get('/subscriptions/{id}', 'SubscriptionController@show')->name('subscriptions.show');
Route::get('/subscriptions/count', 'SubscriptionController@count')->name('subscriptions.count');
Route::get('/subscriptions/pin/{pin}', 'SubscriptionController@getByPin')->name('subscriptions.getByPin');

