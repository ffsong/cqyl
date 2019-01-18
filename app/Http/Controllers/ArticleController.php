<?php

namespace App\Http\Controllers;

use App\Category;
use App\Config;
use App\Article;
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
    public function index(Request $request , Article $article ,Category $category)
    {

       $configs = $this->configs;
       $categorys = $this->categorys;


        //联系我们
        $contact  = $article->getContact();
        //内页侧边栏分类
        $category_left= $category->getCategorylist($request->category_id);

        $type = $category->where('id',$request->category_id)->value('type');

        switch ($type) {
            case '1':
                //普通分类
                $article_lists = $this->getArticle($article,$request->category_id,$page = 15);
                $view = 'article.lists';
                break;

            case '2':
                //单页分类
                $article = $article->where('cateaory_id',$request->category_id)
                    ->where('status',1)->first()->toArray();
                $view = 'article.alone';
                break;

            case '3':
                //图片分类
                $article_lists = $this->getArticle($article,$request->category_id,$page = 6);
                $view = 'article.image_list';
                break;
        }

         return view($view,compact('categorys','configs','article','article_lists','contact','category_left'));
    }

    /**
      * 获取文章分页列表
      * $article 文章对象
      * $cateaory_id 分类id
      * $page 条数 
      * return
      */

   public function getArticle($article,$cateaory_id,$page = 15)
   {
        $list = $article->where('cateaory_id',$cateaory_id)
        ->where('status',1)
        ->select('id','cateaory_id','title','created_at','images')
        ->orderBy('sort','desc')
        ->paginate(15);

        return $list;
   }



    //文章详情
    public function show(Request $request , Article $articles,Category $category)
    {

        $configs = $this->configs;
        $categorys = $this->categorys;

        $articles->where('id',$request->article_id)->increment('click_number');

        $contact  = $articles->getContact();

        //内页侧边栏分类
        $category_left= $category->getCategorylist($request->category_id);
        $type = $category->where('id',$request->category_id)->value('type');

        switch ($type) {
            case '1': 
                //普通文章
                $view = 'article.show';
                $article = $articles->where('id',$request->article_id)->where('status',1)->get(); 
                break;
            case '2':
                //单页分类
                $view = 'article.alone';
                $article = $articles->where('cateaory_id',$request->category_id)->where('status',1)->first()->toArray();
                break;
            default:
                $view = 'article.show';
                $article = $articles->where('id',$request->article_id)->where('status',1)->get();
                break;
        }
            return view($view,compact('categorys','configs','article','contact','category_left'));
    }



    //文件下载
    public function down(Request $request)
    {
        if($request->id)
        {
          $enclosure = Article::where('id',$request->id)->value('enclosure');
          return response()->download(realpath(base_path('public/uploads')).'/'.$enclosure);
        }
       abort(404);
    }

}
