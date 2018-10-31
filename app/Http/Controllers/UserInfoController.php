<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use auth;
use App\Divison;
use App\District;
use App\Thana;
use App\User;
use App\users;
use App\Info;
use App\BloodName;
use App\Last_Donnetion_Noti;
use App\Http\Controllers\Rquest;
class UserInfoController extends Controller
{
    public function addInformation(Request $request){
            $id = auth::User('id');
            $id = $id->id;
           // dd($id);
          //  dd("true");
            //when login user should not have any data in record
            if($request->isMethod('post')){
                $data=$request->input();
                $info= new Info();
                //data save in information table
                $info->user_id = $id;
                $info->name = $data['name'];
                $info->blood_group = $data['blood'];
                $info->divison = $data['divison'];
                $info->district = $data['district'];
                $info->thana = $data['thana'];
                $info->area = $data['area'];
                $info->contact = $data['contact'];
                $info->last_date_donation = $data['donate_time'];
                $info->facebook_url = $data['name'];
                $info->save();
                return redirect ('/user/view-information')->with('flash_message_success','Your Information is sucessfully updated');
            }
    }
    
    public function viewInformation(){
            $logon_user = auth::User('id');
            $id = $logon_user->id;
            //dd($id);
            $user_info = Info::where('user_id',$id)->first();
            $divison = Divison::get();
            $district = District::get();
            $thana = Thana::get();
            $blood = BloodName::get();

        return view ('/user/information/view_information',compact('user_info','divison','district','thana','blood','logon_user'));
    }
    
    public function updateInformation(Request $request,$id=null){
        //dd($id);
        if($request->isMethod('post')){
            $data = $request->input();
            if(!empty($data)){
                $info = Info::FindOrFail($id);
                //dd($info,$data);
                $info->divison = $data['divison'];
                $info->district = $data['district'];
                $info->thana = $data['thana'];
                $info->area = $data['area'];
                $info->contact = $data['contact'];
                $info->facebook_url = $data['url'];
                $info->save();
                return redirect ('/user/view-information')->with('flash_message_success','Your Information is sucessfully updated');
            }else{
                 return redirect ('/user/view-information')->with('flash_message_success','Please Check Again to Input');
            }
      }
       
    }
    public function donerInformation(Request $request){
        $blood = BloodName::get();
        $divison = Divison::get();
        $district = District::get();
        $thana = Thana::get();
        $user_info_blood = [];
      if($request->isMethod('post')){
        $data = $request->input();
          
            if(!empty($data)){
                if($data['blood'] != '' && $data['divison'] == '' && $data['district'] == '' && $data['thana'] == ''){
                  $user_info_blood = Info::where('blood_group',$data['blood'])->get();
                }elseif ($data['blood'] == '' && $data['divison'] != '' && $data['district'] == '' && $data['thana'] == '') {
                  $user_info_blood = Info::where('divison',$data['divison'])->get();
                }elseif ($data['blood'] == '' && $data['divison'] == '' && $data['district'] != '' && $data['thana'] == '') {
                  $user_info_blood = Info::where('district',$data['district'])->get();
                }elseif ($data['blood'] == '' && $data['divison'] == '' && $data['district'] == '' && $data['thana'] != '') {
                  $user_info_blood = Info::where('thana',$data['thana'])->get();
                }elseif ($data['blood'] != '' && $data['divison'] != '' && $data['district'] == '' && $data['thana'] == '') {
                  $user_info_blood = Info::where('blood_group',$data['blood'])->where('divison',$data['divison'])->get();
                }elseif ($data['blood'] != '' && $data['divison'] == '' && $data['district'] != '' && $data['thana'] == '') {
                  $user_info_blood = Info::where('blood_group',$data['blood'])->where('district',$data['district'])->get();
                }elseif ($data['blood'] != '' && $data['divison'] == '' && $data['district'] == '' && $data['thana'] != '') {
                  $user_info_blood = Info::where('blood_group',$data['blood'])->where('thana',$data['thana'])->get();
                }elseif ($data['blood'] == '' && $data['divison'] != '' && $data['district'] != '' && $data['thana'] == '') {
                  $user_info_blood = Info::where('divison',$data['divison'])->where('district',$data['district'])->get();
                }elseif ($data['blood'] == '' && $data['divison'] != '' && $data['district'] == '' && $data['thana'] != '') {
                  $user_info_blood = Info::where('divison',$data['divison'])->where('thana',$data['thana'])->get();
                }elseif ($data['blood'] == '' && $data['divison'] == '' && $data['district'] != '' && $data['thana'] != '') {
                  $user_info_blood = Info::where('district',$data['district'])->where('thana',$data['thana'])->get();
                }elseif ($data['blood'] != '' && $data['divison'] != '' && $data['district'] != '' && $data['thana'] == '') {
                  $user_info_blood = Info::where('blood_group',$data['blood'])->where('divison',$data['divison'])->where('district',$data['district'])->get();
                }elseif ($data['blood'] != '' && $data['divison'] != '' && $data['district'] == '' && $data['thana'] != '') {
                  $user_info_blood = Info::where('blood_group',$data['blood'])->where('divison',$data['divison'])->where('thana',$data['thana'])->get();
                }elseif ($data['blood'] != '' && $data['divison'] == '' && $data['district'] != '' && $data['thana'] != '') {
                  $user_info_blood = Info::where('blood_group',$data['blood'])->where('district',$data['district'])->where('thana',$data['thana'])->get();
                }elseif ($data['blood'] == '' && $data['divison'] != '' && $data['district'] != '' && $data['thana'] != '') {
                  $user_info_blood = Info::where('divison',$data['divison'])->where('district',$data['district'])->where('thana',$data['thana'])->get();
                }elseif ($data['blood'] != '' && $data['divison'] != '' && $data['district'] != '' && $data['thana'] != '') {
                  $user_info_blood = Info::where('blood_group',$data['blood'])->where('divison',$data['divison'])->where('district',$data['district'])->where('thana',$data['thana'])->get();
                }
                // dd($user_info_blood);
                  return view ('user.information.donar_list',compact('user_info_blood','blood','divison','thana'));
          }else{
          return redirect ('/user/doner-information')->with('flash_message_success','Check out the requiret information');
          }
        }else{
        return view ('user.information.donar_list',compact('blood','divison','user_info_blood'));
      }
    }
    public function donnetionDate(){
        $user_info = [];
        $Donnetion_noti = [];
        $Donnetion_noti = Last_Donnetion_Noti::where('status_id',1)->first();
        $user_info = auth::User();
        $user_id = $user_info->id;
        $user_info = Info::where('user_id',$user_id)->first();
        if($user_info == null){
          return redirect ('/user/information')->with('flash_message_success','Please at first update your information in About you Here');
        }
        return view('user.information.last_donnetion',compact('user_info','Donnetion_noti'));
    }
    public function updateDonnetionDate(Request $request,$id=null){
        if($request->isMethod('post')){
          $data = $request->input();
          //dd($data);
          if(!empty($data)){
            if($data['donnetion_date'] < $data['donate_time']){
              $info = Info::FindOrFail($id);
              $info->last_date_donation = $data['donate_time'];
              $info->save();
              return redirect('/user/last-donnetion')->with('flash_message_success','Thanks for your information');
            }else{
              return redirect('/user/last-donnetion')->with('flash_message_error','Please provide right information');
            }
          }
        }
    }

}