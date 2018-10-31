<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\get;
use App\Divison;
use App\District;
use App\Thana;
use App\User;
use App\users;
use App\Info;
use App\BloodName;

use Illuminate\Support\Facades\Input;
use auth;


class AreaController extends Controller
{

    public function Information (){

        $id = auth::User('id');
        $id = $id->id;
        $user_info = Info::where('user_id',$id)->first();
        if(empty($user_info)){
          //  dd("true");
            $blood = BloodName::all();
            $divison = Divison::all();
            return view ('user.information.information',compact('divison','blood'));
        
        }else{


            return redirect ('/user/view-information');

        }
    }

    public function GetDistric(){
        //dd($id);
        $id = Input::get("id");
        $district = District::where('divison_id', $id)->get();
        //$thana = Thana::where('divison_id', $id)->get();
        
         return $district;
    }
    public function GetThana(){
        $id = Input::get("id");
      //  dd($id);
        $thana = Thana::where('district_id', $id)->get();
        //dd($thana);
       return $thana;
    
    } 
    public function GetDivionThana(){
        $id = Input::get("id");
      //  dd($id);
        $thana = Thana::where('divison_id', $id)->get();
        //dd($thana);
       return $thana;
    
    } 
}

