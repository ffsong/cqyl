<?php
/**
 * 公共方法
 */

namespace App\Admin\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class CommonController extends Controller
{
    //清除首页缓存
    public function clearCache()
    {
        Cache::flush();
        return response()->json();
    }
}
