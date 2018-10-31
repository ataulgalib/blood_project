<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\info;
use App\Divison;
use App\District;
use App\thana;
use App\Post;
use App\Writing;
use App\Comment;
use App\Tips_Comment;
use App\Post_Notification;
use App\Last_Donnetion_Noti;


class AdminController extends Controller
{
    public function getUserInfo(){
        $user_info = User::get();
        $i=1;
        return view('admin.user_info',compact('user_info','i'));
    }

    public function viewUserInfo(Request $request,$id=null){
        //dd($id);
        $user_info = Info::where('user_id',$id)->get();
        $i=1;
        return view('admin.view_info',compact('user_info','i'));
    }


    public function deleteUserInfo(Request $request,$p_id=null){
       
        $post = Post::where('user_id',$p_id)->get();
        foreach($post as $p){
            $post_id = $p->id;
            $comment = Comment::where('post_id',$post_id)->get();
            Comment::where('post_id',$post_id)->delete();
            post::where('user_id',$p_id)->delete();
        }
        $writing = Writing::where('user_id',$p_id)->get();
        foreach ($writing as $articel) {
            $writing_id = $articel->id;
            $articel_comment = Tips_Comment::where('writing_id',$writing_id)->get();
            Tips_Comment::where('writing_id',$writing_id)->delete();
            Writing::where('user_id',$p_id)->delete();
        }
        Info::where('user_id',$p_id)->delete();
        User::where('id',$p_id)->delete();


        return redirect('/admin/user-info')->with('flash_message_success','User Information is fully Deleted form database ; 
        There are no record in our database');
    }


    //Area_mannagement

    public function addDivison(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            //dd($data['divison']);
            if(!empty($data)){
                $model = new Divison;
                //dd($model);
                //dd($data);
                $model->name = $request->divison;
                //dd("done");
                $model->save();
                return redirect('/admin/add-divison')->with('flash_message_success','Divison Name is saved');
            }
        }
        return view('admin.area_mannagement.divison');
    }
    public function addDistrict(Request $request){
        $divison = Divison::get();
        if($request->isMethod('post')){
            $data = $request->input();
            //dd($data);
            if(!empty($data)){
                $model = new District;
                $model->divison_id = $data['divison'];
                $model->name = $data['district'];
                $model->save();
                return redirect('/admin/add-district')->with('flash_message_success','District Name is saved');
            }
        }
        return view('admin.area_mannagement.district',compact('divison'));
    }
    public function addThana(Request $request){
        $divison = Divison::get();
        if($request->isMethod('post')){
            $data = $request->input();
            if(!empty($data)){
                $model = new Thana;
                $model->divison_id = $data['divison'];
                $model->district_id = $data['district'];
                $model->name = $data['thana'];
                $model->save();
                return redirect('/admin/add-thana')->with('flash_message_success','Thana Name is saved');
            }
        }
        return view('admin.area_mannagement.thana',compact('divison'));
    }
    public function lisrArea(Request $request){
        $area = [];
        $i=1;
        $divison = Divison::get();
        if($request->isMethod('post')){
            $data=$request->input();
            if(!empty($data)){
                //dd($data);
                if($data['divison'] != '' && $data['district'] == '' && $data['thana'] == ''){
                    $area = Thana::where('divison_id',$data['divison'])->get();
                  }elseif ($data['divison'] == '' && $data['district'] != '' && $data['thana'] == '') {
                    $area = Thana::where('district_id',$data['district'])->get();
                  }elseif ($data['divison'] == '' && $data['district'] == '' && $data['thana'] != '') {
                    $area = Thana::where('id',$data['thana'])->get();
                  }elseif ($data['divison'] != '' && $data['district'] != '' && $data['thana'] == '') {
                    $area = Thana::where('divison_id',$data['divison'])->where('district_id',$data['district'])->get();
                  }elseif ($data['divison'] != '' && $data['district'] == '' && $data['thana'] != '') {
                    $area = Thana::where('divison_id',$data['divison'])->where('id',$data['thana'])->get();
                  }elseif ($data['divison'] == '' && $data['district'] != '' && $data['thana'] != '') {
                    $area = Thana::where('district_id',$data['district'])->where('id',$data['thana'])->get();
                  }elseif($data['divison'] !='' && $data['district'] != '' && $data['thana'] !==''){
                    $area = Thana::where('divison_id',$data[divison])->where('district_id',$data['district'])->where('id',$data['thana']);
                  }
                    return view ('admin.area_mannagement.list_of_area',compact('divison','area','i'));
            }
            else{
                return redirect ('/admin/list-area')->with('flash_message_success','Check out the requiret information');
            }
        
        }
        return view('admin.area_mannagement.list_of_area',compact('divison','area','i'));
    }


    //Notification Setting 

    public function PostNotification(Request $request){
        $post_noti =[];
        $deactive = 0;
        $active_status = 1;
        $i = 1; 
        $post_noti =  Post_Notification::Where('status_id',$active_status)->get();
        if($request->isMethod('post')){
            $data = $request->input();
            $post_noti =  Post_Notification::Where('status_id',$i)->get();
            foreach($post_noti as $status){
                $status->status_id = $deactive;
                $status->save();
            }
            //dd($post_noti);
            $post_noti = new Post_Notification;
            $post_noti->status_id = 1;
            $post_noti->post_making = $data['post_making'];
            $post_noti->post_checking = $data['post_checking'];
            $post_noti->save();
            return redirect('/admin/add-post-notification')->with('flash_message_success','Your Massege is Sucessfully saved for usere');
            //dd($data);
        }

        return view ('admin.notification_setting.post_noti',compact('post_noti','i'));
    }

    public function LastDonnetionNotification(Request $request){
        $Donnetion_noti =[];
        $deactive = 0;
        $active_status = 1;
        $i = 1; 
        $Donnetion_noti =  Last_Donnetion_Noti::Where('status_id',$active_status)->get();
        if($request->isMethod('post')){
            $data = $request->input();
            $Donnetion_noti =  Last_Donnetion_Noti::Where('status_id',$i)->get();
            foreach($Donnetion_noti as $status){
                $status->status_id = $deactive;
                $status->save();
                //dd($Donnetion_noti);
            }
            //dd($post_noti);
            $Donnetion_noti = new Last_Donnetion_Noti;
            $Donnetion_noti->status_id = 1;
            $Donnetion_noti->last_donnation = $request->last_donnation_time;
            $Donnetion_noti->save();
            return redirect('admin/add-last-donnetion-notification')->with('flash_message_success','Your Massege is Sucessfully saved for usere');
        }

        return view('admin.notification_setting.last_donnation_noti',compact('Donnetion_noti','i'));
    }
}
