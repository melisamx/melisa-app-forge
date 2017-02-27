<?php 

Route::get('{keyConnection}/{database}/{table}/add', 'FormsController@add')->middleware('gate:task.forge.forms.add.access');
Route::get('{keyConnection}/{database}/{table}/view', 'FormsController@view')->middleware('gate:task.forge.forms.view.access');
