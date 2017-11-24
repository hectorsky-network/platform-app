<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 2017-11-22
 * Time: 11:07
 */

Route::get('/authserver/authenticate', 'AuthServerController@auth');
Route::post('/authserver/authenticate', 'AuthServerController@auth');
Route::get('/authserver/refresh', 'AuthServerController@refreshAuth');
Route::post('/authserver/refresh', 'AuthServerController@refreshAuth');
Route::get('/authserver/validate', 'AuthServerController@validateAuth');
Route::post('/authserver/validate', 'AuthServerController@validateAuth');
Route::post('/authserver/invalidate', 'AuthServerController@invalidateAuth');