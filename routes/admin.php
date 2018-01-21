<?php

Route::get('home', 'Admin\Dashboard@index');

Route::resources([
    'counties' => 'Admin\CountyController',
    // 'lotteries' => 'Admin\LotteryController',
]);

Route::get('/lotteries', 'Admin\LotteryController@index')->name('lotteries.index');
Route::get('/lotteries/create', 'Admin\LotteryController@create')->name('lotteries.create');
Route::post('/lotteries', 'Admin\LotteryController@store')->name('lotteries.store');
Route::get('/lotteries/{parentLottery}/edit', 'Admin\LotteryController@edit')->name('lotteries.edit');
Route::put('/lotteries/{parentLottery}/', 'Admin\LotteryController@update')->name('lotteries.update');
Route::delete('/lotteries/{parentLottery}/', 'Admin\LotteryController@destroy')->name('lotteries.destroy');

/**
 * Logs
 */
Route::get('/lotteries/log', 'Admin\LotteryLogController@index')->name('lotteries.log');


/**
 * Password
 */
Route::get('password/change', 'Admin\PasswordController@change')->name('password.change');
Route::post('password/set', 'Admin\PasswordController@set')->name('password.set');
Route::post('password/update', 'Admin\PasswordController@update')->name('password.update');

/**
 * DataTable Users
 */
Route::view('/users', 'admin.users.index')->name('users.show');
Route::resource('datatable/users', 'Admin\DataTable\UserController', ['except'=> ['show']]);
