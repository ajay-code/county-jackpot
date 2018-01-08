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
Route::get('lotteries', 'LotteryController@index')->name('lotteries');
Route::get('lotteries/{parentLottery}/buy', 'LotteryController@buy');
Route::post('lotteries/{parentLottery}/buy', 'PurchasesLotteryController@store');

Route::get('lotteries/{lotteryTransaction}/game', 'LotteryController@game');
Route::get('lotteries/{lotteryTransaction}/play', 'LotteryController@play');


/**
 * Transactions
 */
Route::get('/transactions', 'TransactionController@index')->name('transactions');

/**
 * User Lotteries
 */
Route::get('/my-lotteries', 'UserLotteryController@index')->name('user.lotteries');

/**
 * Store game result
 */
Route::post('game/result/store', 'TransactionController@storeResult');
