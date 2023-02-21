<?php

use Illuminate\Support\Facades\Route;


Route::get('/result', 'ResultController@index')->name('results');

Route::get('/result/{id}', 'ResultController@show')->name('result_show');

// Route::post('/voucher/use', 'VoucherController@getReward')->name('voucher-get-reward');

// Route::post('/voucher/use/{id}', 'VoucherController@use')->name('voucher-use');