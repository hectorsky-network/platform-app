<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 2017-11-24
 * Time: 00:03
 */



// Modpacks Routes
Route::get('/admin/modpacks/add', 'Admin\ModpacksController@add')->name('admin-addmodpack')->middleware(['auth','admin']);
Route::get('/admin/modpacks/delete/{id}','Admin\ModpacksController@delete')->name('admin-delmodpack')->middleware(['auth','admin']);
Route::get('/admin/modpacks/edit/{id}','Admin\ModpacksController@edit')->name('admin-editmodpack')->middleware(['auth','admin']);

//Modpack Posts
Route::post('/admin/modpacks/add', 'Admin\ModpacksController@create')->name('admin-addmodpack-1')->middleware(['auth','admin']);
Route::post('/admin/modpacks/edit/{id}','Admin\ModpacksController@update')->name('admin-editmodpack-1')->middleware(['auth','admin']);

// Admin Basic Routes
Route::get('/admin', 'Admin\AdminController@index')->name('admin')->middleware(['auth','admin']);
Route::get('/admin/modpacks', 'Admin\ModpacksController@index')->name('admin-modpacks')->middleware(['auth','admin']);
Route::get('/admin/users', 'Admin\UsersController@index')->name('admin-users')->middleware(['auth','admin']);
Route::get('/admin/settings', 'Admin\AdminController@index')->name('admin-settings')->middleware(['auth','admin']);


// User Routes
Route::get('/admin/users/add', 'Admin\AdminCPController@adduser')->name('admin-adduser')->middleware(['auth','admin']);


// User Account
Route::get('/admin/users/delete/{id}','Admin\UsersController@delete')->name('admin-deluser')->middleware(['auth','admin']);
Route::get('/admin/users/edit/{id}','Admin\UsersController@edit')->name('admin-edituser')->middleware(['auth','admin']);
// Delete users skin/cape
Route::get('/admin/users/skin/delete/{id}','Admin\UsersController@deleteskin')->name('admin-delskin')->middleware(['auth','admin']);
Route::get('/admin/users/cape/delete/{id}','Admin\UsersController@deletecape')->name('admin-delcape')->middleware(['auth','admin']);

//Users Posts
Route::post('/admin/users/edit/{id}','Admin\UsersController@update')->name('admin-edituser-1')->middleware(['auth','admin']);
Route::post('/admin/users/add', 'Admin\UsersController@create')->name('admin-adduser-1')->middleware(['auth','admin']);