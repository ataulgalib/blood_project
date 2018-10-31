<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Divison;
use App\District;
use App\Thana;
use App\Users;
use App\Info;
use App\BloodName;
use App\Writing;
use App\Tips_Comment;
use App\Service;
use Illuminate\Support\Facades\Input;


class ViewController extends Controller
{ 

    //viewer_information
    public function view(){
        $post = Post::get();
        $post = $post->reverse();
       // $comment = Comment::get();
     //   dd($post);
        return view('viewer.dashbord',compact('post'));
    }

    //viewer_comment_option
    public function addPostcommnet(Request $request, $id=null){
      //  dd($id);

        //find out the user id from the post table
        $post = Post::where('id',$id)->first();
        $post_id = $post->id;
        $user_id = $post->user_id;
       // dd($post_id,$user_id);
    
        if($request->isMethod('post')){
            $data = $request->input();
           // dd($data);
           if(!empty($data)) {
                $comment = new Comment();
                $comment->post_id = $post_id;
                $comment->user_id = $user_id;
                $comment->email = $data['email'];
                $comment->comment = $data['comment'];
                $comment->save();
                return redirect('/')->with('flash_message_success','Your Comment is done');
                
           }
           else{
            return redirect('/')->with('flash_message_success','Please fill up the email and comment correctly');
           }
        }
        
        //return view('viewer.comment');
    }
    public function viewPostcommnet(Request $request,$id=null){
       // dd($id);
        $post = Post::where('id',$id)->first();
       //find post id form post table
       $post_id = $post->id;
       $comment = Comment::where('post_id',$post_id)->get();
        return view('viewer.post_comment',compact('post','comment'));
    }


    //viewer_donner_list
    public function donnerList(Request $request){

        $divison = Divison::get();
        $district = District::get();
        $thana = Thana::get();
        $blood = BloodName::get();
        $user_info_blood = [];
        if($request->isMethod('post')){
            $data = $request->input();
            //dd($data);

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
                  return view('viewer.donner_list',compact('user_info_blood','divison','blood','district','thana'));
            }
            else{
                return redirect('/donner-list')->with('flash_message_success','Check out the requiret information');
            }
        }else{
            return view('viewer.donner_list',compact('divison','blood','district','thana','user_info_blood'));
        }
    }

    //Dropdown_list
    public function GetDistric(){
        //dd($id);
        $id = Input::get("id");
        $district = District::where('divison_id', $id)->get();
        return $district;
    }
    public function GetThana(){
        $id = Input::get("id");
        $thana = Thana::where('district_id', $id)->get();
       return $thana;
    
    }

    //artical_portion
    public function viewTips($cid){
      //dd($cid);
        if(empty($cid)){
          //dd($cid);
          $content = Writing::get();
            return view('viewer.tips',compact('content'));
        }else{
          //dd($cid);
          $content = writing::where('id',$cid)->first();
          $writing_id = $content->id;
          $comment = Tips_Comment::Where('writing_id',$writing_id)->get();
          //dd($comment);
          return view('viewer.tips_comment',compact('content','comment'));
        }
    }
    public function addTipsCommnet(Request $request,$id=null){
      $content = Writing::where('id',$id)->first();
      $content_id = $content->id;
      $user_id = $content->user_id;
      //dd($user_id);
      if($request->isMethod('post')){
        $data = $request->Input();
        if(!empty($data)){
          //dd($data);
          $comment = new Tips_Comment();
          $comment->user_id = $user_id;
          $comment->writing_id = $content_id;
          $comment->email = $data['email'];
          $comment->comment = $data['comment'];
          $comment->save();
          return redirect('/view-tips/0')->with('flash_message_success','Your Comment is done');
        }else{
          return redirect('/view-tips/0')->with('flash_message_success','SomeThing Going wrong Contact with developer');
        }
      }
      //return view();
    }

    //Find_hospital_information
    public function hospitalInfo(Request $request){
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
                 return view ('viewer.hospital_info',compact('service','divison'));
            }
            else{
                return redirect ('/user/view-service')->with('flash_message_success','Check out the requiret information');
          }
        }else{
        return view ('viewer.hospital_info',compact('service','divison'));
    }
  }
    
}
