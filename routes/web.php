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
    $articles = Article::OrderBy('created_at', 'text')->paginate(3);
    return view('welcome')->with(compact('articles'));
});

Route::get('/modpacks', function () {
    $modpacks = Modpack::paginate(6);
    return view('modpacks')->with(compact('modpacks'));
})->name('modpacks');


///
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/article/{id}', 'SiteController@articleview')->name('article-view');
Route::get('/modpacks/modpack/{name}', 'SiteController@modpackView')->name('modpack-view');
Route::get('/modpacks/modpack/{name}/star', 'SiteController@modpackStar')->name('modpack-star')->middleware('auth');
Route::get('/modpacks/modpack/{name}/delstar', 'SiteController@modpackDelStar')->name('modpack-delstar')->middleware('auth');



//USER ACCOUNT
Auth::routes();
Route::get('/settings', 'SettingsController@index')->name('settings');
Route::get('/settings/modpacks', 'SettingsController@ownedModpacks')->name('modpacks-u');
Route::get('/settings/skin', 'SettingsController@changeSkin')->name('skin');
Route::post('/settings/skin/update', 'SettingsController@updateSkin')->name('skin-u');
