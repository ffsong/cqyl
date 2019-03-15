<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
class Article extends Model
{
    public $table = 'articles';


    public function cateaory()
    {
        return $this->belongsTo(Category::class, 'cateaory_id');
    }

    /*
     * 获取首页关于我们
     */
    public function getHomeArticle(){

        $article = Cache::rememberForever('get_article',function (){

            $article['about'] = $this->getHomeAbout();
            $article['customers'] = $this->getHomeCustomers();

            return $article;
        });


        return $article;
    }
    
    //获取首页关于我们
    public function getHomeAbout()
    {
         return self::where('cateaory_id',1)->where('status',1)->limit(1)->orderBy('sort','desc')->get();
    }

    //获取首页典型客户
    public function getHomeCustomers()
    {
        return self::where('cateaory_id',4)->where('status',1)->limit(4)->orderBy('sort','desc')->get();
    }

    /*
     * 获取新闻列表
     * $article_data 新闻分类的数据
     * $page_num  每页数量
     * */
    public function getNewLists($article_data =[] ,$page_num = 3)
    {

        $result = Cache::rememberForever('get_new_lists',function () use ($article_data,$page_num){
            foreach ($article_data as $key => $article ){
                $article_data[$key]['list'] = $article_data[$key]->articles()->orderBy('sort','desc')->paginate($page_num);
            }
            return $article_data;
        });

        return $result;
    }



}
