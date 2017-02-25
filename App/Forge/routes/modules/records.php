<?php 

Route::post('create/{keyConnection}/{database}/{table}/create', 'RecordsController@create')->middleware('gate:task.forge.records.create');
