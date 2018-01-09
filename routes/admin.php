<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 2017-11-24
 * Time: 00:03
 */
Route::get('/admin', 'Admin\AdminCPController@index')->name('admin')->middleware(['auth','admin']);
Route::get('/admin/users', 'Admin\AdminCPController@users')->name('admin-users')->middleware(['auth','admin']);
Route::get('/admin/modpacks', 'Admin\AdminCPController@modpacks')->name('admin-modpacks')->middleware(['auth','admin']);
Route::get('/admin/articles', 'Admin\AdminCPController@articles')->name('admin-articles')->middleware(['auth','admin']);
Route::get('/admin/users/add', 'Admin\AdminCPController@adduser')->name('admin-adduser')->middleware(['auth','admin']);
Route::get('/admin/modpacks/add', 'Admin\AdminCPController@addmodpack')->name('admin-addmodpack')->middleware(['auth','admin']);
Route::get('/admin/articles/add', 'Admin\AdminCPController@addarticle')->name('admin-addarticle')->middleware(['auth','admin']);


Route::get('/admin/users/skin/delete/{id}','Admin\AdminCPController@deleteskin')->name('admin-delskin')->middleware(['auth','admin']);
Route::get('/admin/users/cape/delete/{id}','Admin\AdminCPController@deletecape')->name('admin-delcape')->middleware(['auth','admin']);
Route::get('/admin/users/delete/{id}','Admin\AdminCPController@deleteuser')->name('admin-deluser')->middleware(['auth','admin']);
Route::get('/admin/modpacks/delete/{id}','Admin\AdminCPController@deletemodpack')->name('admin-delmodpack')->middleware(['auth','admin']);
Route::get('/admin/modpacks/editing/{id}','Admin\AdminCPController@editmodpack')->name('admin-editmodpack')->middleware(['auth','admin']);
Route::get('/admin/articles/editing/{id}','Admin\AdminCPController@editarticle')->name('admin-editarticle')->middleware(['auth','admin']);
Route::get('/admin/users/editing/{id}','Admin\AdminCPController@edituser')->name('admin-edituser')->middleware(['auth','admin']);


Route::post('/admin/users/add', 'Admin\AdminCPController@createuser')->name('admin-adduser-1')->middleware(['auth','admin']);
Route::post('/admin/articles/add', 'Admin\AdminCPController@createarticle')->name('admin-addarticle-1')->middleware(['auth','admin']);
Route::post('/admin/modpacks/add', 'Admin\AdminCPController@createmodpack')->name('admin-addmodpack-1')->middleware(['auth','admin']);
Route::post('/admin/users/editing/{id}','Admin\AdminCPController@updateprofile')->name('admin-edituser-1')->middleware(['auth','admin']);
Route::post('/admin/articles/editing/{id}','Admin\AdminCPController@updatearticle')->name('admin-editarticle-1')->middleware(['auth','admin']);
Route::post('/admin/modpacks/editing/{id}','Admin\AdminCPController@updatemodpack')->name('admin-editmodpack-1')->middleware(['auth','admin']);