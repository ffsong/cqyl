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

Route::get('/', 'HomeController@index')->name('/');

//关于我们
Route::get('/abouts.html', 'HomeController@about')->name('abouts');

//新闻中心
Route::get('/news/{category_id}/{article_id?}', 'HomeController@news')->name('news');

//业务范围
Route::get('/business/{id?}', 'HomeController@business')->name('business');

//客户
Route::get('/customers/{id?}', 'HomeController@customer')->name('customers');

//联系我们
Route::get('/contacts/{id?}', 'HomeController@contact')->name('contacts');

//表单提交
Route::post('/message', 'HomeController@message')->name('message');

//文件下载
Route::get('/down/{id}', 'HomeController@down')->name('down');
