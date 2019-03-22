<?php

// Modpacks Routes
Route::get('/admin/modpacks/add', 'Admin\ModpacksController@add')->name('admin.modpacks.add.form')->middleware(['auth','admin']);
Route::get('/admin/modpacks/delete/{id}','Admin\ModpacksController@delete')->name('admin.modpacks.remove')->middleware(['auth','admin']);
Route::get('/admin/modpacks/edit/{id}','Admin\ModpacksController@edit')->name('admin.modpacks.edit.form')->middleware(['auth','admin']);

//Modpack Posts
Route::post('/admin/modpacks/add', 'Admin\ModpacksController@create')->name('admin.modpacks.add')->middleware(['auth','admin']);
Route::post('/admin/modpacks/edit/{id}','Admin\ModpacksController@update')->name('admin.modpacks.edit')->middleware(['auth','admin']);

// Admin Basic Routes
Route::get('/admin', 'Admin\AdminController@index')->name('admin')->middleware(['auth','admin']);
Route::get('/admin/modpacks', 'Admin\ModpacksController@index')->name('admin.modpacks')->middleware(['auth','admin']);
Route::get('/admin/users', 'Admin\UsersController@index')->name('admin.users')->middleware(['auth','admin']);
Route::get('/admin/settings', 'Admin\AdminController@index')->name('admin.settings')->middleware(['auth','admin']);

// User Management

// view user profile
Route::get('/admin/users/profile/{id}','Admin\UsersController@profile')->name('admin.users.view')->middleware(['auth','admin']);

//forms
Route::get('/admin/users/add', 'Admin\UsersController@add')->name('admin.users.add.form')->middleware(['auth','admin']);
Route::get('/admin/users/edit/{id}','Admin\UsersController@edit')->name('admin.users.edit.form')->middleware(['auth','admin']);

//delete user
Route::get('/admin/users/delete/{id}','Admin\UsersController@delete')->name('admin.users.delete')->middleware(['auth','admin']);

//invalidate user token
Route::get('/admin/users/profile/{id}/invalidate/{id2}','Admin\UsersController@invalidateToken')->name('admin.users.invalidate.token')->middleware(['auth','admin']);

// Delete users skin
Route::get('/admin/users/skin/delete/{id}','Admin\UsersController@deleteskin')->name('admin.users.skin.delete')->middleware(['auth','admin']);

// Delete user cape
Route::get('/admin/users/cape/delete/{id}','Admin\UsersController@deletecape')->name('admin.users.cape.delete')->middleware(['auth','admin']);

//Users Posts

//edit users post
Route::post('/admin/users/edit/{id}','Admin\UsersController@update')->name('admin.users.edit')->middleware(['auth','admin']);

//add user post
Route::post('/admin/users/add', 'Admin\UsersController@create')->name('admin.users.add')->middleware(['auth','admin']);