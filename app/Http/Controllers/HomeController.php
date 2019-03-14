<?php
/**
 * 网站首页
 */

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Config;
use App\Image;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    //公共数据
    public $common_data = [];

    public function __construct(Category $category)
    {
        //分类
        $this->common_data['categorys'] = $category->getHomeCategory();

        //banner
        $this->common_data['banners'] = Image::all();
    }

    //首页
    public function index(Article $article ,Category $category)
    {
        $common_data = $this->common_data;
        $article_data = $article->getHomeArticle();

        $article_data['news'] = $category->getHomeNews();
        //组合首页新闻
        $article_data['news'] = $article->getNewLists($article_data['news']);

       return view('index.index',compact('common_data','article_data'));
    }


    //关于我们
    public function about(Article $article)
    {
        $common_data = $this->common_data;

        $result= $article->where('cateaory_id',1)->where('status',1)->paginate(1);

        return view('abouts.index',compact('common_data','result'));
    }


    //新闻中心
    public function news(Article $article , Category $category, $category_id , $article_id = 0 ){

        $common_data = $this->common_data;

        $paginate = 3; //默认页码

        if(empty($id)){
            //新闻列表页
            //大屏内容
            $article_lists= $article->where('cateaory_id', $category_id)->where('status',1)->paginate($paginate);

            $new_categorys =  $category->getHomeNews();

            //小屏内容
            $article_data = $category->getHomeNews();
            //组合新闻
            $article_data = $article->getNewLists($article_data,$paginate);
            return view('news.list',compact('common_data','new_categorys','article_lists','article_data'));
        }


        return view('news.list',compact('common_data','new_categorys','article_lists'));
    }


    public function business()
    {
        $common_data = $this->common_data;

        return view('business.index',compact('common_data'));
    }

    public function customer()
    {
        $common_data = $this->common_data;

        return view('customers.index',compact('common_data'));
    }

    public function contact()
    {
        $common_data = $this->common_data;

        return view('contacts.index',compact('common_data'));
    }

}
