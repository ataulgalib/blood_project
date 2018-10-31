@extends('layouts.user_layout.user_design');
@Section('content')

<!--main-container-part-->
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="{{URL::to('/user/dashbord')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
      <a href="">Donner Info.</a> 
    </div>
      <h1>Your Blood Donnetion Date</h1>
        <div class="container-fluid">
            <p>{{$Donnetion_noti->last_donnation}}</p>
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
        <div class="widget-title"> <span class="icon"> <i class="icon icon-pencil"></i> </span>
          <h5>Update Your Donnetion Date</h5>
        </div>
        <div class="widget-content nopadding">

          <form action="{{URL::to('/user/update-donnetion-date/'.$user_info->id)}}" method="post" class="form-horizontal">  {{csrf_field()}}

            <div class="control-group">
              <label class="control-label">Recent Donnetion date</label>
              <div class="controls">
                <input type="text" name="donnetion_date" id="donnetion_date" class="span11" value="{{$user_info->last_date_donation}}"/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Last Donetion Date</label>
              <div class="controls">
                <input type="date" date-formate="dd/mm/yyyy" name="donate_time" id="donate_time" class="span11" placeholder="Last Date of blood Donetion" required/>
              </div>
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

@endsection;