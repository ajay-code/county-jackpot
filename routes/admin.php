<?php

Route::get('home', 'Admin\Dashboard@index');

Route::resources([
    'counties' => 'Admin\CountyController',
    'lotteries' => 'Admin\LotteryController',
]);

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
