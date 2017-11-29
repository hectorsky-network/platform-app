<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 2017-11-24
 * Time: 00:03
 */
Route::get('/admin', 'AdminCPController@index')->name('admin')->middleware(['auth','admin']);
Route::get('/admin/users', 'AdminCPController@users')->name('admin-users')->middleware(['auth','admin']);
Route::get('/admin/modpacks', 'AdminCPController@modpacks')->name('admin-modpacks')->middleware(['auth','admin']);
Route::get('/admin/articles', 'AdminCPController@articles')->name('admin-articles')->middleware(['auth','admin']);
Route::get('/admin/users/add', 'AdminCPController@adduser')->name('admin-adduser')->middleware(['auth','admin']);
Route::get('/admin/modpacks/add', 'AdminCPController@addmodpack')->name('admin-addmodpack')->middleware(['auth','admin']);
Route::get('/admin/articles/add', 'AdminCPController@addarticle')->name('admin-addarticle')->middleware(['auth','admin']);


Route::get('/admin/users/skin/delete/{id}','AdminCPController@deleteskin')->name('admin-delskin')->middleware(['auth','admin']);
Route::get('/admin/users/cape/delete/{id}','AdminCPController@deletecape')->name('admin-delcape')->middleware(['auth','admin']);
Route::get('/admin/users/delete/{id}','AdminCPController@deleteuser')->name('admin-deluser')->middleware(['auth','admin']);
Route::get('/admin/modpacks/delete/{id}','AdminCPController@deletemodpack')->name('admin-delmodpack')->middleware(['auth','admin']);
Route::get('/admin/modpacks/edit/{id}','AdminCPController@editmodpack')->name('admin-editmodpack')->middleware(['auth','admin']);
Route::get('/admin/articles/edit/{id}','AdminCPController@editarticle')->name('admin-editarticle')->middleware(['auth','admin']);
Route::get('/admin/users/edit/{id}','AdminCPController@edituser')->name('admin-edituser')->middleware(['auth','admin']);


Route::post('/admin/users/add', 'AdminCPController@createuser')->name('admin-adduser-1')->middleware(['auth','admin']);
Route::post('/admin/articles/add', 'AdminCPController@createarticle')->name('admin-addarticle-1')->middleware(['auth','admin']);
Route::post('/admin/modpacks/add', 'AdminCPController@createmodpack')->name('admin-addmodpack-1')->middleware(['auth','admin']);
Route::post('/admin/users/edit/{id}','AdminCPController@updateprofile')->name('admin-edituser-1')->middleware(['auth','admin']);
Route::post('/admin/articles/edit/{id}','AdminCPController@updatearticle')->name('admin-editarticle-1')->middleware(['auth','admin']);
Route::post('/admin/modpacks/edit/{id}','AdminCPController@updatemodpack')->name('admin-editmodpack-1')->middleware(['auth','admin']);