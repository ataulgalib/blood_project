@extends('layouts.user_layout.user_design');
@Section('content')

<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> 
  <a href="{{URL::to('/user/dashbord')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
  <a href="">Your Post</a> 
    </div>
      <h1>Your Post</h1>
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
  <div>
    <table class="table table-bordered table-dark">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Divison</th>
          <th scope="col">District</th>
          <th scope="col">thana</th>
          <th scope="col">Area</th>
          <th scope="col">Contact</th>
          <th scope="col">Facebook</th>
        </tr>
      </thead>
      <tbody> 
    @foreach($user_info as $info)
        <tr>
          <td>{{$info->name}}</td>
          <td>{{App\Info::geDivisonName($info->divison)}}</td>
          <td>{{App\Info::geDistrictName($info->district)}}</td>
          <td>{{App\Info::geThanaName($info->thana)}}</td>
          <td>{{$info->area}}</td>
          <td>{{$info->contact}}</td>
          <td>{{$info->facebook_url}}</td>
        </tr>
    @endforeach
      </tbody>
    </table>
  </div>
</div>    


@endsection;