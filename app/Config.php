<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Config extends Model
{
    public $table = 'config';

    public $timestamps = false;

    public static function getConfig()
    {
        $result = Cache::rememberForever('get_config',function (){
            return self::first();
        });

        return $result;

    }

}
