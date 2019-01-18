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

Route::get('/', 'HomeController@index')->name('home');

//列表
Route::get('/articles/{category_id}', 'ArticleController@index')->name('articles');

//文件下载
Route::get('/down/{id}', 'ArticleController@down')->name('down');

//详情
Route::get('/articles/{category_id}/show/{article_id}','ArticleController@show')->name('show');