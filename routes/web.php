<?php

$this->group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){

    Route::post('historic', 'BalanceController@searchHistoric')->name('historic.search');
    Route::get('historic', 'BalanceController@historic')->name('admin.historic');

    Route::post('balance/confirm-transfer', 'BalanceController@confirmTranfer')->name('confirm.transfer');
    Route::post('balance/transfer', 'BalanceController@transferStore')->name('transfer.store');
    Route::get('balance/transfer', 'BalanceController@transfer')->name('balance.transfer');

    Route::post('balance/withdrawn', 'BalanceController@withdrawnStore')->name('withdrawn.store');
    Route::get('balance/withdrawn', 'BalanceController@withdrawn')->name('balance.withdrawn');

    Route::post('balance/deposit', 'BalanceController@depositStore')->name('deposit.store');
    Route::get('balance/deposit', 'BalanceController@deposit')->name('balance.deposit');

    Route::get('balance', 'BalanceController@index')->name('admin.balance');
    Route::get('/', 'AdminController@index')->name('admin.home');
});


Route::get('/', 'Site\SiteController@index')->name('home');

Auth::routes();
