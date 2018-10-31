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
            <p>{{$post_noti->post_checking}}</p>
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
          <th scope="col">SL</th>
          <th scope="col">Date</th>
          <th scope="col">post</th>
          <th scope="col">Action </th>
        </tr>
      </thead>
      <tbody> 
      @foreach($post as $p)
        <tr>
          <td>{{$i++}}</td>
          <td>{{$p->created_at}}</td>
          <td>{{$p->post}}</td>
          <td class="center">
            <a href="{{URL::to('/view-comment/'.$p->id)}}" class="btn btn-success btn-mini">View</a> 
            <a href="{{URL::to('user/view-update/'.$p->id)}}" class="btn btn-primary btn-mini">Edit</a>
            <a href="{{URL::to('user/post-delete/'.$p->id)}}" class="btn btn-danger btn-mini" id="arlDel" >Delete</a> 
          </td>
        </tr>
        
        @endforeach 
      </tbody>
    </table>
  </div>
</div>    

@endsection
