<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User;
use App\Http\Controllers\Check;
use EqualTo;
use App\Http\Controllers\Controller;
use App\Users;
use Illuminate\Support\Facades\Redirect;
use Auth;
Use Session;
use App\Comment;
use App\Post;
use App\Post_Notification;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller

{
    
    public function login(Request $request){
        if($request->isMethod('post')){
            $data=$request->input();
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                $tb_data=auth::user();
                $id = $tb_data->id;
                if($tb_data->role == 0){
                    //Admin_loged_In
                }else{
                    //Register
                }
                
                return redirect ('user/dashbord');
            }
        else{
            
            return redirect ('/user/login')->with ('flash_message_error','Your Email And Password are not match Please Try again. N:B:
            If You Are Not SignUp Than Please SignUp First.');
          }
        }

        return view('user.user_login');
    }
    Public function signup(Request $request){
       // dd($request);
       if($request->isMethod('post')){
            $data = $request->all();
            if(!empty($data)){
                $email = User::get();
                foreach ($email as $email){
                    $email = $email->email;
                    if($data['email']== $email){
                        return redirect('/signup')->with('flash_message_error','Sorry; your email id is used, Please try with another email id');
                    }
                }
                //dd("done");
                if($data['password1'] == $data['password2']){
                    //dd("true");
                    $user = new Users();
                    $user->name= $data['name'];
                    //data_insert_in_database_by_Sub_category
                    $user->email = $data['email'];
                    $user->remember_token =$data['_token'];
                    $user->password = Hash::make($data['password1']);
                    $user->role= '1';
                    $user->save();
                    return redirect('/user/dashbord');
                }else{
                    //dd("false");
                    return redirect('/signup')->with('flash_message_error','Your Re-type Password is not Same');
                }
            }else{
                return redirect('/signup');
            }
        }
        return view('signup');
    }

    public function dashbord (){ 
        $post = [];
        $post = Post::get();
        $comment = [];
        $commnet = Comment::get();
        $post_noti = Post_Notification::where('status_id',1)->first();
        //dd($post);
        return view ('user.dashbord',compact('post','comment','post_noti'));      
    }

    public function setting(){
        return view(('user.setting'));
    }
    public function updatePassword(Request $request){

        if($request->isMethod('post')){
            $data=$request->all();
            $check_password = user::where(['email'=>Auth::user()->email])->first();
            $current_password = $data['currtent_pass'];
            $email = $data['email'];
           // dd($id);
            $db_email= ($check_password->email);
            //current_Email_Shoul_be_Checked
            if($email == $db_email){
                //dd("match");
                    if(Hash::check($current_password,$check_password->password)){
                        //echo "true";die;
                        $password = bcrypt($data['new_pass']);
                        User::where('email',$db_email)->update(['password'=>$password]);
                        return redirect ('/user/setting')->with ('flash_message_success','password update sucessfully');
                    }else{
                        return redirect ('/user/setting')->with ('flash_message_error','Incorrect current password');
                }
             }else{
                return redirect ('/user/setting')->with ('flash_message_error','Your Currtent Email is not valid');
                }
         }

    }
    public function logout(){
        Session::flush();
        return redirect('/user/login')->with('flash_message_sucess','logout properly');
    }


}
