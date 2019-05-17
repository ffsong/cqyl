<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Category extends Model
{
    public $table = 'categorys';


    public function articles()
    {
        return $this->hasMany(Article::class,'cateaory_id');
    }



    /*后台start*/
    /*
     * 读取全部分类 key=>vaule
     * @param $id 编辑的分类id 0 为新增分类  1 为编辑分类
     * */
    public static function getAll($id = 0 )
    {
        if( $id == 0){
            $re = self::getCategory();
        }else{
            $re = self::all()->pluck('title', 'id')->toArray();
//            unset($re[$id]);
        }

        array_unshift($re,'顶级分类');
        return $re;
    }

    //获取全部分类
    public static function getCategory()
    {

        $re = self::where('status',1)->get()->pluck('title', 'id')->toArray();
        return $re;
    }
    /*后台end*/

    /*前台*/

    //获取首页分类
    public function getHomeCategory()
    {
        $cateaory = Cache::rememberForever('get_home_category',function (){
            return $this->getTopNav();
        });

        return $cateaory;
    }

    /*
     * 首页导航
     */
    public function getTopNav()
    {
        $result = self::where('pid',0)->select('id','title')->orderBy('sort','desc')->get();

        foreach ($result as $key => $value){
            //读取分类下的文章或者子分类
            if($value->id == 2 || $value->id == 3 || $value->id == 4 || $value->id == 12){
                //新闻中心-返回分类  ->whereIn('id', )
                $result[$key]['list_title'] = self::where('pid',$value->id)
                    ->where('status',1)->select('id','title')->orderBy('sort','desc')->get();

                //顶级栏目下有子栏目和文章的情况
                if($value->id == 12){
                    $result[$key]['list_article'] = Article::where('cateaory_id',$value->id)->where('status',1)
                        ->select('id','cateaory_id','title')->orderBy('sort','desc')->first();
                }
            }else{
                //返回文章
                $result[$key]['list_title'] = Article::where('cateaory_id',$value->id)->where('status',1)->select('id','title')->orderBy('sort','desc')->get();
            }
        }

         return $result;
    }


    //获取首页新闻
    public function getHomeNews()
    {
        $result = Cache::rememberForever('get_home_news',function (){
            return self::where('pid',2)->with('articles')->get();
        });

        return $result;
    }

    /**
     * 首页业务范围
     * @return Object
     */
    public function getHomeBusiness()
    {
        $result = Cache::rememberForever('get_home_business',function (){

            $business['business'] = self::where('id',3)->first();
            $business['business']['list'] = self::where('pid',3)->get();
            return $business;
        });
        return $result;
    }

}
        
