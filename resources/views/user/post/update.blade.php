@extends('layouts.user_layout.user_design');
@Section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="{{URL::to('/user/dashbord')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
      <a href="{{URL::to('/user/view-post')}}">Your Post</a>
      <a href="">Edit Post</a> 
    </div>
      <h1>Edit Your Post...</h1>
        <div class="container-fluid">
            <p></p>
        </div>
      <hr>   
</div>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Help for Blood</h5>
      </div>
      <div class="widget-content">
        <div class="control-group">
          <form action="{{URL::to('user/post-update/'.$status->id)}}" method="post"> {{csrf_field()}}
            <div class="controls">
              <textarea name="post" class="textarea_editor span12" rows="6" placeholder="Enter text ..." required>{{$status->post}}</textarea>
            </div> 
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
