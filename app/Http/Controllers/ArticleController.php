<?php

namespace App\Http\Controllers;

use App\Category;
use App\Config;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public $categorys;

    public $configs;

    public function __construct(Category $category)
    {
        //nav 分类
        $this->categorys = $category->getHomeCategory();

        //公司信息
        $this->configs = Config::first();
    }

    //文章列表
    public function index()
    {


       $configs = $this->configs;
       $categorys = $this->categorys;

        return view('article.lists',compact('categorys','configs'));
    }

    //文章详情
    public function show()
    {

        $configs = $this->configs;
        $categorys = $this->categorys;

        return view('article.show',compact('categorys','configs'));
    }

}
