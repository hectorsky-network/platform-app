<?php
Route::get('/api/launcher/version/stable4', 'LauncherController@launcherupdate');
Route::get('/api/modpack/{name}', 'LauncherController@getModpack');
Route::get('/api/discover', 'LauncherController@discover');

Route::get('/api/modpack/{name}/stat/install', 'LauncherController@addInstall');
Route::get('/api/modpack/{name}/stat/run', 'LauncherController@addRun');

Route::get('/api/head', 'LauncherController@getHead')->name('gethead');