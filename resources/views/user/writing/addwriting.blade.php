@extends('layouts.user_layout.user_design');
@Section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="{{URL::to('/user/dashbord')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
      <a href="">Articel</a>
      <a href="">Write Articel</a> 
    </div>
    <h1>Write a articel</h1>
      <div class="container-fluid">
        <p>Admin Massage For User</p>
      </div>
    <hr>   
    <div class="container-fluid">
    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
          <h5>Articel</h5>
        </div>
        <div class="widget-content">
          <div class="control-group">
          <form  enctype="" action="{{URL::to('/user/add-content')}}" method="post"> {{csrf_field()}}
            <div class="control-group">
              <label class="control-label"></label>
                <div class="controls">
                  <input name="title" id="title" type="text" class="span11"  placeholder="Title Name" required >
                </div>
            </div>
            <div class="controls">
              <textarea name="content" class="textarea_editor span12" rows="6" placeholder="Write About Your Artical..." required></textarea>
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

