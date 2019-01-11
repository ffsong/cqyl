<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    public $table = 'links';

    public function getLink()
    {
        return $this->orderBy('sort','desc')->get();
    }

}
