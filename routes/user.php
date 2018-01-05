<?php

Route::get('profile', 'ProfileController@index')->name('profile.index');
Route::put('profile/{user}', 'ProfileController@update')->name('profile.update');

/**
 * Password
 */
Route::get('password/change', 'PasswordController@change')->name('password.change');
Route::post('password/set', 'PasswordController@set')->name('password.set');
Route::post('password/update', 'PasswordController@update')->name('password.update');


/**
 * Lottery
 */
Route::get('lotteries', 'LotteryController@index');
Route::get('lotteries/{lottery}/buy', 'LotteryController@buy');
Route::post('lotteries/{lottery}/buy', 'PurchasesLotteryController@store');


/**
 * Transactions
 */
Route::get('/transactions', 'TransactionController@index');