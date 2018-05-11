<?php

Route::get('profile', 'ProfileController@index')->name('profile.index');
Route::get('profile/edit', 'ProfileController@edit')->name('profile.edit');
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
Route::get('county-draw', 'LotteryController@index');
Route::get('county-draw/{parentLottery}/buy', 'LotteryController@buy');
Route::post('county-draw/{parentLottery}/buy', 'PurchasesLotteryController@store');
// game
Route::get('county-draw/{parentLottery}/game', 'LotteryController@game');
Route::get('county-draw/{parentLottery}/play', 'LotteryController@play');


/**
 * Transactions
 */
Route::get('/transactions', 'TransactionController@index')->name('transactions');

/**
 * User Lotteries
 */
Route::get('/my-draws', 'UserLotteryController@index');

/**
 * Store game result
 */
Route::post('game/result/store', 'TransactionController@storeResult');

/**
 * Balance and approvals
 */
Route::get('balance', 'BalanceAppeovalConyroller@balance')->name('balance');
Route::get('balance/log', 'BalanceAppeovalConyroller@log')->name('balance');
Route::get('bank-details/edit', 'BankDetailsController@edit')->name('bank-detail.edit');
Route::put('bank-details', 'BankDetailsController@update')->name('bank-detail.update');

/**
 * Get Paid
 */
Route::post('/get-paid', 'UserPaidController@getPaid')->name('get-paid');
Route::get('/withdrawal-history', '<UserP></UserP>aidController@withdrawalHistory')->name('withdrawal-history');
