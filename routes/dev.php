<?php


Route::post('county-draw/{parentLottery}/paypal', 'PaymentController@payWithpaypal')->name('paypal.buy');
Route::get('county-draw/{parentLottery}/paypal/buy', 'PaymentController@store')->name('paypal.store');



// Route::get('/paypal/create', 'PaypalDevController@createWebProfile')->name('paypal.createWebProfile');
// Route::get('/paypal/delete', 'PaypalDevController@deleteWebProfile')->name('paypal.deleteWebProfile');