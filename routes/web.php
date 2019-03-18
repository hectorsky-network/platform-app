<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Article;
use App\Modpack;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/launcher', function () {
    return view('launcher');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/modpacks', function () {
    $modpacks = Modpack::paginate(6);
    return view('modpacks')->with(compact('modpacks'));
})->name('modpacks');


///
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/modpacks/modpack/{name}', 'SiteController@modpackView')->name('modpack-view');
Route::get('/modpacks/modpack/{name}/star', 'SiteController@modpackStar')->name('modpack-star')->middleware('auth');
Route::get('/modpacks/modpack/{name}/delstar', 'SiteController@modpackDelStar')->name('modpack-delstar')->middleware('auth');



//USER ACCOUNT
Auth::routes();
Route::get('/settings', 'SettingsController@index')->name('settings');
Route::get('/settings/modpacks', 'SettingsController@ownedModpacks')->name('modpacks-u');
Route::get('/settings/skin', 'SettingsController@changeSkin')->name('skin');
Route::post('/settings/skin/update', 'SettingsController@updateSkin')->name('skin-u');
//Route::get('/settings/profile/{user}',  ['as' => 'user.editprofile', 'uses' => 'Auth\ProfileController@edit']);
//Route::patch('/settings/profile/{user}/update',  ['as' => 'user.editprofile2', 'uses' => 'Auth\ProfileController@update']);
