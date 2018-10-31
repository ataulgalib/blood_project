@extends('layouts.user_layout.user_design');
@Section('content')

<<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{URL::to('/user/dashbord')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
    <a href="">Setting</a> 
    </div>
    <h1>Update Your PassWord</h1>
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
  <div class="container-fluid"><hr>
  
    <div class="row-fluid">

      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Security validation</h5>
            </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal" method="post" action="{{URL::to('/user/update-pwd')}}" name="password_validate" id="password_validate" novalidate="novalidate"> {{csrf_field()}}
              <div class="control-group">
              <label class="control-label">Email</label>
                  <div class="controls">
                    <input type="Email" name="email" id="email" />
                    <span id="chkPwd"></span>
                  </div> 
                  <label class="control-label">Current Password</label>
                  <div class="controls">
                    <input type="password" name="currtent_pass" id="currtent_pass" />
                    <span id="chkPwd"></span>
                  </div>  
              <div class="control-group">
                  <label class="control-label">New Password</label>
                  <div class="controls">
                    <input type="password" name="new_pass" id="new_pass" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Confirm password</label>
                  <div class="controls">
                    <input type="password" name="update_pass" id="update_pass" />
                  </div>
                </div>
                <div class="form-actions">
                  <input type="submit" value="Update" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection;

