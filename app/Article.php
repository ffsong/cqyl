<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class Article extends Model
{
    public $table = 'articles';


    public function cateaory()
    {
        return $this->belongsTo(Category::class, 'cateaory_id');
    }

    //获取导航栏下的文章或者子分类 $cateaory_id 分类id  弃用
    public static function getChildren($cateaory_id)
    {
        if($cateaory_id == 2){
            //新闻中心-返回分类
            return Category::where('pid',$cateaory_id)->where('status',1)->select('id','title')
                ->orderBy('sort','desc')->orderBy('id','desc')->get();
        }else{
            //返回文章
            return self::where('cateaory_id',$cateaory_id)->where('status',1)->select('id','title')
                ->orderBy('sort','desc')->orderBy('id','desc')->get();
        }
    }


    /*
     * 获取首页关于我们和典型客户
     */
    public function getHomeArticle()
    {
        $article = Cache::rememberForever('get_article',function (){

            $article['about'] = $this->getHomeAbout();
            $article['industry_case'] = $this->getIndustryCase();
            return $article;
        });

        return $article;
    }
    
    //获取首页关于我们
    public function getHomeAbout()
    {
         return self::where('cateaory_id',1)->where('status',1)
             ->orderBy('sort','desc')->first();
    }

    //获取首页行业案例
    public function getIndustryCase()
    {
        return self::where('cateaory_id',4)->where('status',1)->limit(4)
            ->orderBy('sort','desc')->orderBy('id','desc')->get();
    }

    /*
     * 获取新闻列表
     * $article_data 新闻分类的数据
     * $page_num  每页数量
     * */
    public function getNewLists($article_data =[] ,$page_num = 4)
    {

        $result = Cache::rememberForever('get_new_lists',function () use ($article_data,$page_num){
            foreach ($article_data as $key => $article ){
                $article_data[$key]['list'] = $article->articles()
                    ->where('status',1)->orderBy('sort','desc')->select('id','cateaory_id','title','images','created_at')->orderBy('id','desc')->paginate($page_num);
            }
            return $article_data;
        });

        return $result;
    }

    /**
     * 获取首页新闻图片列表
     * @param $category_id 分类id
     * @param $page_num 数量
     * return Object 图片列表
     */
    public function getNewListImgs($category_id,$page_num = 4)
    {

        $result = Cache::rememberForever('get_new_list_imgs',function () use ($category_id,$page_num){

            return self::where('cateaory_id',$category_id)->where('images','<>','')->where('status',1)->select('id','title','images','cateaory_id')
                ->orderBy('sort','desc')->orderBy('id','desc')->offset(0)->limit('4')->get();
        });

        return $result;
    }


    /**/
    public function getCreatedAtAttribute($value)
    {
        return substr($value,0,10);
    }

}
