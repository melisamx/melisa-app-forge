<?php 

Route::post('create/{keyConnection}/{database}/{table}', 'RecordsController@create')->middleware('gate:task.forge.records.create');
Route::get('paging/{keyConnection}/{database}/{table}', 'RecordsController@pagingByKey')->middleware('gate:task.forge.records.paging');
