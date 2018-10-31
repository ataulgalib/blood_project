@extends('layouts.user_layout.user_design');
@Section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="{{URL::to('/user/dashbord')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
      <a href="">Area Mannagement</a> 
    </div>
      <h1>Mannagement</h1>
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
        <div class="widget-title"> <span class="icon"> <i class="icon-search"></i> </span>
          <h5>Add Thana </h5>
        </div>
        <div class="widget-content nopadding">
          <form name="frm" action="{{URL::to('/admin/add-thana')}}" method="post" class="form-horizontal">  {{csrf_field()}}


            <div class="control-group">
                <label class="control-label">Divison</label>
                <div class="controls"> 
                    <select style="width:200px" name="divison" id="divison" class="form-control input-lg dynamic" data-dependent="district" required>
                        <option value="">Select Divison</option>
                        @foreach ($divison as $id) 
                          <option value="{{$id->id}}">{{$id->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="control-group">
              <label class="control-label">District</label>
                <div class="controls"> 
                  <select style="width:200px" name="district" id="district" class="form-control input-lg dynamic" data-dependent="Thana Name" required>
                    <option value="">Select District</option>
                  </select>
            </div>


            <div class="control-group">
              <label class="control-label"> Thana </label>
              <div class="controls">
                <input type="text" name="thana" id="thana" class="span11" placeholder="thana"  required />
              </div>
            </div>
            
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>

          </form>
          
        </div>
      </div>
    
    </div>
  </div>
</div>

<script> 

$(document).ready(function(){
    $('#divison').change(function(){
        var id = $('#divison').val();
        $.ajax({
            type: 'get',
            url: 'getdistric',
            data: {'id': id},
            success: function(result){
                $('select[name="district"]').empty();
                $.each(result, function(key, value){
                    $('select[name="district"]').append('<option value="'+ value['id'] +'">' + value['name'] + '</option>');
                });
                console.log(result);
            },
            error: function(error){
                console.log(error);
            }
            
        });
    });
});

</script>




@endsection;