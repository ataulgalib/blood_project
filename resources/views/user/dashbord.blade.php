@extends('layouts.user_layout.user_design');
@Section('content')




<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
    </div>
      <h1>Write a post...</h1>
        <div class="container-fluid">
            <p>{{$post_noti->post_making}}</p>
        </div>
      <hr>   
  </div>

@if ($message = Session::get('flash_message_error'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>	
      <strong >{{ $message }}</strong>
  </div>
@endif


@if ($message = Session::get('flash_message_success'))
  <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>	
      <strong>{{ $message }}</strong>      
  </div>
@endif
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Help for Blood</h5>
        </div>
        <div class="widget-content">
          <div class="control-group">
            <form  enctype="" action="{{URL::to('/user/view-post')}}" method="post"> {{csrf_field()}}
            <div class="control-group">  
              </div>  
              <div class="controls">
                <textarea name="post" class="textarea_editor span12" rows="6" placeholder="Write Here...." required></textarea>
              </div> 
              <div class="form-actions">
                <button type="submit" class="btn btn-success">Publish</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection;

<!--end-main-container-part-->