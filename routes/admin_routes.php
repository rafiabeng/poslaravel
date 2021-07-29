<?php



Route::get('/admin/dashboard', 'Admin\DashboardController@index');


Route::get('admin/products', 'Admin\ProductController@index');
Route::get('admin/products/create', 'Admin\ProductController@create');
Route::post('admin/products', 'Admin\ProductController@store');

Route::get('admin/products/{id}/edit', 'Admin\ProductController@edit');
Route::delete('admin/products/{id}', 'Admin\ProductController@destroy');
Route::put('/admin/products/{id}','Admin\ProductController@update');

Route::get('admin/attendance', 'Admin\AttendanceController@index');
Route::get('admin/setting', 'Admin\SettingController@index');
Route::put('admin/setting', 'Admin\SettingController@update');

Route::get('admin/insight', 'Admin\InsightController@index');

Route::resource('admin/users', 'Admin\UserController');

Route::get('admin/rekap', 'Admin\RekapPenjualanController@index');