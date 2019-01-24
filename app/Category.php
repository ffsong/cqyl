<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Category extends Model
{
    public $table = 'categorys';


    /*后台end*/
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
            $re['cateaory_top'] = $this->getTopNav();
            $re['cateaory_right'] = $this->getRightNav();

            return $re;
        });

        return $cateaory;
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

     //当前分类和子分类组合和父分类列表
    public function getCategorylist($category_id)
    {
        //获取当前分类
        $cateaory_p = self::where('id',$category_id)->where('status',1)
            ->select('id','title','pid')
            ->get()->toArray();
         
         //获取当前分类的子分类
        $cateaory_ = self::where('pid',$category_id)->where('status',1)
            ->select('id','title')->orderBy('sort','desc')
            ->get()->toArray();

        //获取当前分类的父分类和同等级的分类
        if($cateaory_p[0]['pid']){
            $cateaory = self::where('id',$cateaory_p[0]['pid'])
            ->orWhere('pid',$cateaory_p[0]['pid'])
            ->where('id','<>',$category_id)
            ->where('status',1)
            ->select('id','title')->orderBy('sort','desc')->get()
            ->toArray();
        }

        array_unshift($cateaory_, $cateaory_p[0]);  

        if(isset($cateaory) && count($cateaory)){
            $cateaory_ = array_merge($cateaory,$cateaory_);
        }
        
        return $cateaory_;
    }
}
        
