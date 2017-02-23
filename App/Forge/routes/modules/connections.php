<?php 

//Route::post('/', 'ConnectionsController@create')->middleware('gate:task.forge.connections.create');
Route::post('{idConnection}/databases/{database}/tables/{table}/delete', 'RecordsController@delete')->middleware('gate:task.forge.records.delete');

Route::get('/', 'ConnectionsController@paging')->middleware('gate:task.forge.connections.paging');
Route::get('{idConnection}/databases', 'DatabasesController@paging')->middleware('gate:task.forge.databases.paging');
Route::get('{idConnection}/databases/{database}/tables', 'TablesController@paging')->middleware('gate:task.forge.tables.paging');
Route::get('{idConnection}/databases/{database}/tables/{table}/columns', 'ColumnsController@paging')->middleware('gate:task.forge.columns.paging');
Route::get('{idConnection}/databases/{database}/tables/{table}/paging', 'RecordsController@paging')->middleware('gate:task.forge.records.paging');
