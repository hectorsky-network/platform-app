<?php
Route::get('/api/launcher/version/stable4', 'Game\LauncherController@launcherupdate');
Route::get('/api/modpack/{name}', 'Game\LauncherController@getModpack');
Route::get('/api/discover', 'Game\LauncherController@discover');

Route::get('/api/modpack/{name}/stat/install', 'Game\LauncherController@addInstall');
Route::get('/api/modpack/{name}/stat/run', 'Game\LauncherController@addRun');

Route::get('/api/head', 'Game\LauncherController@getHead')->name('gethead');