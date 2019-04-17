<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    $router->resource('config', ConfigController::class);

    //分类
    $router->resource('categorys', CategoryController::class);

    //图片管理
    $router->resource('images', ImageController::class);

    //企业文化
    $router->resource('cultures', CultureController::class);

    //文章 status为 1 正常 2 删除
    $router->resource('articles', ArticleController::class);

    //典型客户
    $router->resource('articles_customer', ArticleCustomerController::class);

    //回收站文章
    $router->resource('recoverys', ArticleRecoveryController::class);

    //用户留言
    $router->resource('message', MessageController::class);

    //友情链接
    $router->resource('links', LinkController::class);

});

//清除缓存
Route::any('clearCache','App\Admin\Controllers\CommonController@clearCache')->name('clearCache');

Route::any('recovery','App\Admin\Controllers\ArticleRecoveryController@recovery')->name('recovery');
