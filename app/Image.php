<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Image extends Model
{
    public $table = 'images';


    public static function getBanner()
    {
        $result = Cache::rememberForever('get_banner',function (){
            return self::all();
        });
        return $result;
    }

}
