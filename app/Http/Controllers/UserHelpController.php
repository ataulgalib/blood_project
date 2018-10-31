<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use App\Post;
use App\Comment;
use image;
use App\Post_Notification;
class UserHelpController extends Controller
{
    public function bloodpost(){
        return view ('user.post.help');
    }
    public function viewpost(Request $request){
        $id = auth::User();
        if($request->isMethod('post')){
            $data = $request->input();
            if(!empty($data)){
                $post = new Post();
                $post->user_id = $id->id;
                $post->post = $data['post'];
                $post->save();
                return redirect ('/user/view-post')->with('flash_message_success','Post is published');
            }else{
                return redirect ('/user/view-post')->with('flash_message_success','Write the post again');
            }
        }
        $post = Post::where('user_id',$id->id)->get();
        $post_noti = Post_Notification::where('status_id',1)->first();
        $i=1;
        return view ('user.post.view',compact('post','i','post_noti'));
    }
    public function viewupdatePost($id){
       // dd($id);
        $status = Post::where('id',$id)->first();
        //dd($post);
        return view('user.post.update',compact('status'));
    }
    public function updatepost(Request $request,$id=null){
        //dd($id);
        if($request->isMethod('post')){
            $log = auth::User();

            $data = $request->input();
           // dd($data['post']);
            //Post::where('id'=>$id)->update(['post']=>$data['post']);
            Post::where(['id'=>$id])->update(['post'=>$data['post']]);
            return redirect ('/user/view-post')->with('flash_message_success','Your post is sucessfully updated');
        }
        else{
            return redirect ('/user/view-post')->with('flash_message_success','Something Gonig wrong');
        }
    }
    public function deletepost($id=null){
       // dd($id);
        if(!empty($id)){
           // dd($id);
            Post::where(['id'=>$id])->delete();
            Comment::where(['post_id'=>$id])->delete();
            return redirect ('/user/view-post')->with('flash_message_success','Your post is Deleted');
        }
        else{
            return redirect ('/user/view-post')->with('flash_message_success','Something going wrong');
        }
    }

}
