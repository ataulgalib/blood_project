<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thana extends Model
{
    
    protected $table = 'thana_tb';
    public static function DivisonName($divison_id){
        $model= Divison::where('id',$divison_id)->first();
        if($model){
        return $model->name;
        }
        return "";
    }

    public static function DistrictName($district_id){
        $model= District::where('id',$district_id)->first();
        if($model){
        return $model->name;
        }
        return "";
    }
}
