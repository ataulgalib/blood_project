<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Writing extends Model
{
    protected $table = 'writing_tb';
    public static function getUserName($user_id){
        $model= Users::where('id',$user_id)->first();
        if($model){
        return $model->email;
        }
        return "";
    }
}
