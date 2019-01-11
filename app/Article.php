<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $table = 'articles';


    public function cateaory()
    {
        return $this->belongsTo(Category::class, 'cateaory_id');
    }

    /*
     * 获取首页文章
     */
    public function getArticle(){

        $article['news'] = $this->getNewList();
        $article['notice'] = $this->getNoticeList();
        $article['equipment'] = $this->getEquipmentList();
        $article['introduction'] = $this->getIntroduction();
        $article['contact'] = $this->getContact();

        return $article;
    }

    //新闻列表
    public function getNewList()
    {
        return $this->where('cateaory_id',1)->select('id','title','images','created_at')->limit(6)->latest()->get();
    }

    //通知公告
    public function getNoticeList(){
        return $this->where('cateaory_id',2)->select('id','title','created_at')->limit(6)->latest()->get();
    }

    //设备展示
    public function getEquipmentList(){
        return $this->where('cateaory_id',9)->select('id','title','images')->limit(6)->latest()->get();
    }

    //公司简介
    public function getIntroduction()
    {
        return $this->where('id',3)->select('id','title','introduction')->get();

    }

    //联系方式
    public function getContact()
    {
        return $this->where('id',4)->select('id','title','content')->get();
    }







}
