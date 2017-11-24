<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 2017-11-22
 * Time: 22:19
 */
Route::get('gameapi/profile/name/{id}','GameAPIController@usuuid');
Route::get('gameapi/profile/{id}','GameAPIController@profile');
Route::post('gameapi/session/join','GameAPIController@joinclient');
Route::get('gameapi/session/hasJoined','GameAPIController@joinserver');
