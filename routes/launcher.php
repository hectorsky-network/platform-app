<?php
Route::get('/api/launcher/version/stable4', 'LauncherController@launcherupdate');
Route::get('/api/modpack/{name}', 'LauncherController@getModpack');
Route::get('/api/head', 'LauncherController@getHead')->name('gethead');