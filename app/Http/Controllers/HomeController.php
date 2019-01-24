<?php
/**
 * 网站首页
 */

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Config;
use App\Link;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Article $article ,Category $category ,Link $link)
    {
        //nav 分类
       $categorys = $category->getHomeCategory();

       //新闻
        $articles = $article->getArticle();

        //友情链接
        $links = $link->getLink();

        //公司信息
        $configs = Config::first();


       return view('home.index',compact('categorys', 'articles', 'links','configs'));
    }
}
