<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 2017-11-22
 * Time: 11:07
 */

Route::get('/authserver/authenticate', 'Game\AuthServerController@auth');
Route::post('/authserver/authenticate', 'Game\AuthServerController@auth');
Route::get('/authserver/refresh', 'Game\AuthServerController@refreshAuth');
Route::post('/authserver/refresh', 'Game\AuthServerController@refreshAuth');
Route::get('/authserver/validate', 'Game\AuthServerController@validateAuth');
Route::post('/authserver/validate', 'Game\AuthServerController@validateAuth');
Route::post('/authserver/invalidate', 'Game\AuthServerController@invalidateAuth');