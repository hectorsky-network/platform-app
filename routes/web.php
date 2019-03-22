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

Auth::routes(['verify' => true]);
///
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/modpacks/modpack/{name}', 'SiteController@modpackView')->name('modpacks.view');
Route::get('/modpacks/modpack/{name}/star', 'SiteController@modpackStar')->name('modpacks.star')->middleware('auth');
Route::get('/modpacks/modpack/{name}/delstar', 'SiteController@modpackDelStar')->name('modpacks.star.delete')->middleware('auth');



//USER ACCOUNT
Route::get('/settings', 'SettingsController@index')->name('user')->middleware('auth');
Route::get('/settings/modpacks', 'SettingsController@ownedModpacks')->name('user.modpacks')->middleware(['verified','auth']);
Route::get('/settings/skin', 'SettingsController@changeSkin')->name('user.skin')->middleware(['verified','auth']);
Route::get('/settings/tokens/', 'SettingsController@viewTokens')->name('user.tokens')->middleware(['verified','auth']);
Route::get('/settings/tokens/invalidate/{id}', 'SettingsController@invalidateToken')->name('user.tokens.invalidate')->middleware(['verified','auth']);
Route::post('/settings/skin/update', 'SettingsController@updateSkin')->name('user.skin.update')->middleware(['verified','auth']);
//Route::get('/settings/profile/{user}',  ['as' => 'user.editprofile', 'uses' => 'Auth\ProfileController@edit']);
//Route::patch('/settings/profile/{user}/update',  ['as' => 'user.editprofile2', 'uses' => 'Auth\ProfileController@update']);

Route::get('/home', 'HomeController@index')->name('home');