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

Route::get('/', function () {
    return redirect(route('login'));
});

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

Route::get('/loai-san-pham', 'ProductTypeController@index')->name('index');
Route::get('/them-loai-sanpham', 'ProductTypeController@add')->name('addType');
Route::post('/them-loai-sanpham', 'ProductTypeController@create')->name('createType');
Route::get('/sua-loai-sanpham/{id}', 'ProductTypeController@update')->name('updateType');
Route::post('/sua-loai-sanpham/{id}', 'ProductTypeController@edit')->name('editType');
Route::get('/xoa-loai-sanpham/{id}', 'ProductTypeController@delete')->name('deleteType');

//Route::get('/product-create','ProductController@create')->name('product-create1');
Route::get('/product/add','ProductController@add')->name('product-add');
Route::post('/product-create','ProductController@createproduct')->name('product-create');

Route::get('/sua-sanpham/{id}', 'ProductController@update')->name('updateProduct');
Route::post('/sua-sanpham/{id}', 'ProductController@edit')->name('editProduct');
Route::get('/xoa-sanpham/{id}', 'ProductController@delete')->name('deleteProduct');

Route::get('/product-import','ProductController@import')->name('product-import');
Route::get('/product-release','ProductController@release')->name('product-release');
Route::get('/product-index','ProductController@index')->name('product-index');
Route::get('/add-to-cart/{id}','ProductController@getAddToCart')->name('addToCart');
Route::get('/del-cart/{id}','ProductController@getDelCart')->name('delCart');
Route::get('/xoasession','ProductController@xoasession')->name('xoasession');
Route::post('/bill','ProductController@createBill')->name('bill');