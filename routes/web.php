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

Route::get('/xuat-hang', function () {
    return view('xuathang.xuathang');
});

Route::get('/xuat-hang', 'UserController@xuathang')->name('xuathang');
Route::get('/login', 'UserController@login')->name('login');
Route::get('/logout', 'UserController@logout')->name('logout');
Route::post('/login', 'UserController@postLogin')->name('postLogin');
Route::get('/qlnv', 'UserController@index')->name('qlnv');
Route::get('/them-nhan-vien', 'UserController@addUser')->name('addUser');
Route::post('/them-nhan-vien', 'UserController@creatUser')->name('creatUser');
Route::get('/sua-nhan-vien/{id}', 'UserController@modifyUser')->name('modifyUser');
Route::post('/sua-nhan-vien/{id}', 'UserController@editUser')->name('editUser');
Route::get('/xoa-nhan-vien/{id}', 'UserController@deleteUser')->name('deleteUser');
