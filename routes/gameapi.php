<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 2017-11-22
 * Time: 22:19
 */

Route::get('gameapi/profile/name/{id}','Game\GameAPIController@usuuid');
Route::get('gameapi/profile/{id}','Game\GameAPIController@profile');
Route::post('gameapi/session/join','Game\GameAPIController@joinclient');
Route::get('gameapi/session/hasJoined','Game\GameAPIController@joinserver');

//LEGACY
Route::get('gameapi/legacy/skin/{name}','Game\LegacySkinTranslatorController@skinTranslate');
Route::get('gameapi/legacy/cloak/{name}','Game\LegacySkinTranslatorController@cloakTranslate');
