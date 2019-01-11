<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Category extends Model
{
    public $table = 'categorys';


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

        $re = self::all()->pluck('title', 'id')->toArray();
        return $re;

        $cateaory = Cache::rememberForever('cateaory',function (){
            $re = self::all()->pluck('title', 'id')->toArray();
            return $re;
        });
        return $cateaory;
    }

    //获取首页分类
    public function getHomeCategory()
    {

        $re['cateaory_top'] = $this->getTopNav();
        $re['cateaory_right'] = $this->getRightNav();

        return $re;

//        $cateaory = Cache::rememberForever('cateaory',function (){
//            $re = self::where('pid',0)->select('id','title');
//            return $re;
//        });

//        return $cateaory;
    }

    /*
     * 首页顶部导航
     */
    public function getTopNav()
    {
         return self::where('is_top',1)->select('id','title')->get()->toArray();
    }

    /**
     * 首页侧边栏
     */
    public function getRightNav()
    {
        return self::where('is_right',1)->select('id','title')->get()->toArray();
    }

}
