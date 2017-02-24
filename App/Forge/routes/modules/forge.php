<?php 

Route::get('view', 'ForgeController@view')->middleware('gate:task.forge.forge.view.access');
