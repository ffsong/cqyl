<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Link extends Model
{
    public $table = 'links';

    public function getLink()
    {
        $link = Cache::rememberForever('get_link',function (){

            return $this->orderBy('sort','desc')->get();
        });

        return $link;

    }

}
