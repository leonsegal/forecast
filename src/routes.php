<?php

Route::get('forecast', 'Leonsegal\Forecast\ForecastController@index')->name('home');
Route::post('forecast', 'Leonsegal\Forecast\ForecastController@store');
Route::get('/forecast/{id}', 'Leonsegal\Forecast\ForecastController@show')->name('forecast');