<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Writing;
use App\Tips_Comment;
use auth;

class UserWritingController extends Controller
{
    public function addContent(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            //dd($data);
            if(!empty($data)){
                $user_id = auth::User();
                $user_id = $user_id->id;
                $content = new Writing();
                $content->user_id = $user_id;
                $content->title_name = $data['title'];
                $content->content = $data['content'];
                //dd($data);
                $content->save();
                return redirect('/user/view-content')->with('flash_message_success','Your Content is sucessfully updated');
            }else{
                    return redirect('/user/add-content')->with('flash_message_success','Your Content is not sucessfully updated');
            }
        }
        return view('user.writing.addwriting');
    }
    public function viewContent(){
        $content = [];
        $user_id = auth::User();
        $user_id = $user_id->id;
        $content = Writing::where('user_id',$user_id)->get();
     
        return view('user.writing.viewwriting',compact('content'));
    }
    public function editContent($id){
        //dd($id);
        //$content = [];
        $content = Writing::where('id',$id)->first();
        return view('user.writing.updatewrite',compact('content'));
    }
    public function updateContent(Request $request,$id=null){
        
        if($request->isMethod('post')){
            $data = $request->input();                                                                                                                                                              
            if(!empty($data)){
                $model = Writing::findOrFail($id);
                $model->title_name = $request->title_name;
                $model->content = $request->content;
                $model->save();    
                //dd($model);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         uest
                return redirect('/user/view-content')->with('flash_message_success','Your Content is sucessfully Edited');
            }
            else{
                $content = [];
                $content = Writing::get();
                return view('user.writing.viewwriting',compact('content'));
            }
            
        }  
    }
    public function deleteContent($id){
        if(!empty($id)){
            Writing::where(['id'=>$id])->delete();
            Tips_Comment::where(['writing_id'=>$id])->delete();
            return redirect('/user/view-content')->with('flash_message_success','SucessFully Deleted');
        }else{
            return redirect('/user/view-content')->with('flash_message_success','Something is going wrong Plese Contact the Web Developer');
        }
    }
}