@extends('layouts.user_layout.user_design');
@Section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="{{URL::to('/user/dashbord')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
      <a href="">About You</a> 
    </div>
      <h3>Admin's current Post Notification</h3>
        <div class="container-fluid">
            <p>@if ($message = Session::get('flash_message_success'))
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
@endif</p>
        </div>
      <hr>   
</div>
<div class="widget-content nopadding">
    <table class="table table-bordered table-striped">
    <thead>
        <tr>
        <th scope="col">SL</th>
        <th scope="col">Last Donnation</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($Donnetion_noti as $p) 
        <tr>
        <td>{{$i++}}</td>
        <td>{{$p->last_donnation}}</td>

        

        </tr>
    @endforeach
    </tbody>
    </table>
</div>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span6">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon icon-pencil"></i> </span>
                <h5>Update Your Information</h5>
            </div>
            <div class="widget-content nopadding">
                <form  enctype="" action="{{URL::to('admin/add-last-donnetion-notification')}}" method="post"> {{csrf_field()}}
                    <div class="control-group">  
                        <div class="controls">
                        <textarea name="last_donnation_time" class="textarea_editor span12" rows="6" placeholder="Write here when user make post" required></textarea>
                        </div> 
                        <div class="form-actions">
                        <button type="submit" class="btn btn-success">Publish</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
