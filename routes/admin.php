<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 2017-11-24
 * Time: 00:03
 */
Route::get('/admin', 'AdminCPController@index')->name('admin')->middleware(['auth','admin']);
Route::get('/admin/users', 'AdminCPController@users')->name('admin-users')->middleware(['auth','admin']);
Route::get('/admin/users/add', 'AdminCPController@adduser')->name('admin-adduser')->middleware(['auth','admin']);
Route::get('/admin/users/skin/delete/{id}','AdminCPController@deleteskin')->name('admin-delskin')->middleware(['auth','admin']);
Route::get('/admin/users/cape/delete/{id}','AdminCPController@deletecape')->name('admin-delcape')->middleware(['auth','admin']);
Route::get('/admin/users/delete/{id}','AdminCPController@deleteuser')->name('admin-deluser')->middleware(['auth','admin']);
Route::get('/admin/users/edit/{id}','AdminCPController@edituser')->name('admin-edituser')->middleware(['auth','admin']);


Route::post('/admin/users/add', 'AdminCPController@createuser')->name('admin-adduser-1')->middleware(['auth','admin']);
Route::post('/admin/users/edit/{id}','AdminCPController@updateprofile')->name('admin-edituser-1')->middleware(['auth','admin']);