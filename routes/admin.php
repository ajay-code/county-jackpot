<?php

Route::get('home', 'Admin\Dashboard@index');

Route::resources([
    'counties' => 'Admin\CountyController',
]);

Route::get('/county-draw-info', 'Admin\LotteryController@index')->name('county-draw-info.index');
Route::get('/county-draw-info/create', 'Admin\LotteryController@create')->name('county-draw-info.create');
Route::post('/county-draw-info', 'Admin\LotteryController@store')->name('county-draw-info.store');
Route::get('/county-draw-info/{parentLottery}/edit', 'Admin\LotteryController@edit')->name('county-draw-info.edit');
Route::put('/county-draw-info/{parentLottery}/', 'Admin\LotteryController@update')->name('county-draw-info.update');
Route::delete('/county-draw-info/{parentLottery}/', 'Admin\LotteryController@destroy')->name('county-draw-info.destroy');

/**
 * County Draws
 */
Route::get('/county-draws', 'Admin\CountyDrawController@index')->name('county-draws.draws');
Route::get('/county-draws/{countyDraw}/participants', 'Admin\CountyDrawController@participants')->name('county-draws.draws.participents');



/**
 * DataTable Users
 */
Route::resource('datatable/users', 'Admin\DataTable\UserController', ['except'=> ['show']]);
Route::view('/users', 'admin.users.index')->name('users.show');
Route::get('/users/{user}/profile', 'Admin\UserController@profile')->name('users.profile');
Route::get('/users/{user}/draws', 'Admin\UserController@draws')->name('users.draws');



/**
 * Password
 */
Route::get('password/change', 'Admin\PasswordController@change')->name('password.change');
Route::post('password/set', 'Admin\PasswordController@set')->name('password.set');
Route::post('password/update', 'Admin\PasswordController@update')->name('password.update');
