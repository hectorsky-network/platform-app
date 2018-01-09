<?php

// Launcher Version System
Route::get('/api/launcher/version/stable4', 'Game\LauncherController@launcherstable');
Route::get('/api/launcher/version/beta4', 'Game\LauncherController@launcherbeta');

// Get info about modpack
Route::get('/api/modpack/{name}', 'Game\LauncherController@getModpack');

// Modpack Stats
Route::get('/api/modpack/{name}/stat/install', 'Game\LauncherController@addInstall');
Route::get('/api/modpack/{name}/stat/run', 'Game\LauncherController@addRun');

// Discover page
Route::get('/api/discover', 'Game\LauncherController@discover');

// Head generator
Route::get('/api/head', 'Game\LauncherController@getHead')->name('gethead');