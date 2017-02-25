<?php 

Route::get('{keyConnection}/{database}/{table}/add', 'FormsController@add')->middleware('gate:task.forge.forms.add.access');
