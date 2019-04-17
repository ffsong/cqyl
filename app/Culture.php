<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Culture extends Model
{
    public $table = 'culture';


    //获取企业文化的内容
    public function getList()
    {
        $data['ep'] = $this->getEnterprisePurpose();
        $data['sg'] = $this->getStaffGarden();
        $data['ed'] = $this->getEmployeeDemeanor();

        return $data;
    }

    public function getEnterprisePurpose()
    {
        $result = Cache::rememberForever('EnterprisePurpose',function (){
           return self::where('category',1)->orderBy('sort','DESC')->first();
        });

        return $result;
    }

    //职工园地
    public function getStaffGarden()
    {
        $result = Cache::rememberForever('StaffGarden',function (){
            return self::where('category',2)->offset(0)->limit(6)->orderBy('sort','DESC')->get();
        });

        return $result;
    }

    //员工风采
    public function getEmployeeDemeanor()
    {
        return self::where('category',3)->paginate(6);
    }





}
