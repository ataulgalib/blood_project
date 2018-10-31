<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
//use App\Http\Controllers\Service;
use App\Divison;
use App\District;
use App\Thana;
use auth;
use App\Http\Controllers\Route;

class ServiceController extends Controller
{   
    public function service(){
        //dd("dd");
        $division = Divison::get();
        return view('user.Service.addService',compact('division'));
    }
    public function addService(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            if(!empty($data)){
                
                $service = new Service();
                $user_info = auth::user();
                $user_id = $user_info->id;
                $service->user_id = $user_id;
                $service->hospital_name = $data['name'];
                $service->divison = $data['divison'];
                $service->district = $data['district'];
                $service->thana = $data['thana'];
                $service->area = $data['area'];
                $service->hp_contact = $data['hp_contact'];
                $service->emb_contact = $data['emb_contact'];
                //dd($data);
                $service->save();
                return redirect('/user/view-service')->with('flash_message_success','Your Information is sucessfully updated');

            }else{
                return redirect('/user/service')->with('flash_message_success','Something is goning worong');
            }

        }
    }
    public function viewService(Request $request){
            $service = [];
            $divison = Divison::get();
            $district = District::get();
            $thana = Thana::get();

        if($request->isMethod('post')){
            $data = $request->input();
           //dd($data);
              
                if(!empty($data)){
                    
                    if($data['divison'] != '' && $data['district'] == '' && $data['thana'] == ''){
                        $service = Service::where('divison',$data['divison'])->get();
                      }elseif ($data['divison'] == '' && $data['district'] != '' && $data['thana'] == '') {
                        $service = Service::where('district',$data['district'])->get();
                      }elseif ($data['divison'] == '' && $data['district'] == '' && $data['thana'] != '') {
                        $service = Service::where('thana',$data['thana'])->get();
                      }elseif ($data['divison'] != '' && $data['district'] != '' && $data['thana'] == '') {
                        $service = Service::where('divison',$data['divison'])->where('district',$data['district'])->get();
                      }elseif ($data['divison'] != '' && $data['district'] == '' && $data['thana'] != '') {
                        $service = Service::where('divison',$data['divison'])->where('thana',$data['thana'])->get();
                      }elseif ($data['divison'] == '' && $data['district'] != '' && $data['thana'] != '') {
                        $service = Service::where('district',$data['district'])->where('thana',$data['thana'])->get();
                      }elseif ($data['divison'] == '' && $data['district'] == '' && $data['thana'] != '') {
                        $service = Service::where('blood_group',$data['blood'])->where('thana',$data['thana'])->get();
                      }
                        return view ('user.Service.viewService',compact('service','divison'));
                }
                else{
                    return redirect ('/user/view-service')->with('flash_message_success','Check out the requiret information');
                }
    
            
        }else{
            return view ('user.Service.viewService',compact('service','divison'));
        }
    }
    public function deleteService(Request $request,$id=null){
        if(!empty($id)){
            Service::where(['id'=>$id])->delete();
            return redirect ('/user/view-service')->with('flash_message_success','Service is Deleted');
        }
        else{
            return redirect ('/user/view-service')->with('flash_message_success','SomeThing Going Wrong Contact The Developer');
        }
    }
 
}
