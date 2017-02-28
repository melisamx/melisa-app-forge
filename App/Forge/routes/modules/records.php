<?php 

Route::post('create/{keyConnection}/{database}/{table}', 'RecordsController@create')->middleware('gate:task.forge.records.create');
Route::get('paging/{keyConnection}/{database}/{table}', 'RecordsController@pagingByKey')->middleware('gate:task.forge.records.paging');

Route::post('delete/{keyConnection}/{database}/{table}', 'RecordsController@deleteByKey')->middleware('gate:task.forge.records.delete');
