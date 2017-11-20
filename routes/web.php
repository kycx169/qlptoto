<?php
use Illuminate\Support\Facades\Route;
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

// Route::get('/xuat-hang', function () {
//     return view('xuathang.xuathang');
// });

Route::get('/trang-chu', 'UserController@trangchu')->name('trangchu');
Route::get('/login', 'UserController@login')->name('login');
Route::get('/logout', 'UserController@logout')->name('logout');
Route::post('/login', 'UserController@postLogin')->name('postLogin');
Route::get('/qlnv', 'UserController@index')->name('qlnv');
Route::get('/them-nhan-vien', 'UserController@addUser')->name('addUser');
Route::post('/them-nhan-vien', 'UserController@creatUser')->name('creatUser');
Route::get('/sua-nhan-vien/{id}', 'UserController@modifyUser')->name('modifyUser');
Route::post('/sua-nhan-vien/{id}', 'UserController@editUser')->name('editUser');
Route::get('/xoa-nhan-vien/{id}', 'UserController@deleteUser')->name('deleteUser');

Route::get('/product-create','ProductController@create')->name('product-create');
Route::get('/product-import','ProductController@import')->name('product-import');
Route::get('/product-release','ProductController@release')->name('product-release');
Route::get('/product-index','ProductController@index')->name('product-index');
