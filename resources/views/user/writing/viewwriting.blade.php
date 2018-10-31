@extends('layouts.user_layout.user_design');
@Section('content')

<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> 
  <a href="{{URL::to('/user/dashbord')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
  <a href="">Check Your Articel</a> 
    </div>
      <h1>Your Articel</h1>
        <div class="container-fluid">
            <p>Admin Massage For User</p>
        </div>
      <hr>   
</div>

@if ($message = Session::get('flash_message_success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong >{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('flash_message_error'))
    <div class="alert alert-danger alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>      
    </div>
@endif

<div class="container-fluid">
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class=" icon-pencil"></i> </span>
          <h5>Articel Title Name</h5>
        </div>
        <div class="widget-content nopadding">
          <ul class="recent-posts">
            @foreach($content as $c)
              <li>
               
                <div class=""></div>
                <div class="article-post">
                  <div class="fr">
                  <a href="{{URL::to('/user/edit-content/'.$c->id)}}" class="btn btn-primary btn-mini">Edit</a> 
                  <a href="{{URL::to('/user/delete-content/'.$c->id)}}" class="btn btn-danger btn-mini">Delete</a></div>
                  <p><a href="{{URL::to('/view-tips/'.$c->id)}}">{{$c->title_name}}</a> </p>
                </div>
              </li> 
            @endforeach   
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection;

