<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table='information_tb';

    public static function getBloodName($blood_group){
        $model= BloodName::where('id',$blood_group)->first();
        if($model){
        return $model->name;
        }
        return "";
    }

    public static function geDivisonName($divison){
        $model = Divison::where('id',$divison)->first();
        if($model){
            return $model->name;
        }
        return "";
    }
    public static function geDistrictName($district){
        $model = District::where('id',$district)->first();
        if($model){
            return $model->name;
        }
        return "";
    }
    public static function geThanaName($thana){
        $model = Thana::where('id',$thana)->first();
        if($model){
            return $model->name;
        }
        return "";
    }
    public static function getEmail($user_id){
        $model1 = Users::where('id',$user_id)->first();
        if($model1){
            return $model1->email;
        }
        return "";
    }

}
