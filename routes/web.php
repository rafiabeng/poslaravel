<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::middleware('auth')->group(function () {
    include ('admin_routes.php');

    Route::get('/', function () {
        return redirect('/login');
    });


    Route::get('/absensi2', function () {
        return view('absensi');
    });
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/absen', 'UserAttendanceController@index');
    Route::post('/absen', 'UserAttendanceController@store');
    Route::get('/absen/history', 'UserAttendanceController@history');
    Route::post('admin/products', 'Admin\ProductController@store');

    Route::get('/orderinglist', 'OrderingListController@index');
    Route::post('/orderinglist/finish/{nomor_meja}', 'OrderingListController@finish');
    Route::get('/cart/{no_meja}', 'CartController@index');
    Route::get('/cart/{no_meja}/hapus/{id_produk}', 'CartController@hapusCartItem');
    Route::post('/cart', 'CartController@store');
    
    Route::post('/cart/bayar', 'CartController@pay');

    Route::get('/tables', 'TablesController@index');

    Route::get('/struk/{no_meja}', 'CartController@print');

});