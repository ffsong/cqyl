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
            unset($re[$id]);
        }

        array_unshift($re,'顶级分类');
        return $re;
    }

    //获取全部分类
    public static function getCategory()
    {

        $re = self::where([
            ['id', '<>', '2'],
            ['id', '<>', '4'],
        ])->get()->pluck('title', 'id')->toArray();
        return $re;
        $cateaory = Cache::rememberForever('get_category',function (){

        });
        return $cateaory;
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
         return self::where('pid',0)->select('id','title','route')->orderBy('sort','desc')->get();
    }


    //获取首页新闻
    public function getHomeNews()
    {
        $result = Cache::rememberForever('get_home_news',function (){
            return self::where('pid',2)->with('articles')->get();
        });

        return $result;
    }

}
        
