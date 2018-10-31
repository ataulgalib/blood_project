@extends('layouts.user_layout.user_design');
@Section('content')

<!--main-container-part-->
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="{{URL::to('/user/dashbord')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
      <a href="">Donner Info.</a> 
    </div>
      <h1>Donner information</h1>
        <div class="container-fluid">
            <p>Admin Massage For User</p>
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
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-search"></i> </span>
          <h5>Search Donner</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="frm" action="{{URL::to('/user/doner-information')}}" method="post" class="form-horizontal">  {{csrf_field()}}

            <div class="control-group">
                <label class="control-label">Blood Group</label>
                  <div class="controls"> 
                    <select style="width:200px" name="blood" id="blood" class="form-control input-lg dynamic" required>
                      <option value="">Selecte blood</option>
                        @foreach ($blood as $id) 
                          <option value="{{$id->id}}">{{$id->name}}</option>
                        @endforeach
                    </select>
                  </div>
            </div>

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
                  <select style="width:200px" name="district" id="district" class="form-control input-lg dynamic" data-dependent="thana" required>
                    <option value="">Select District</option>
                  </select>
            </div>
            <div class="control-group">
              <label class="control-label">Thana</label>
                <div class="controls"> 
                    <select style="width:200px" name="thana" id="thana" class="form-control input-lg dynamic" required>
                      <option value=""> Select Thana </option>
                    </select>
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
  <div>
    <table class="table table-bordered table-dark">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Blood Group</th>
          <th scope="col">Divison</th>
          <th scope="col">District</th>
          <th scope="col">Thana</th>
          <th scope="col">Area</th>
          <th scope="col">Contact</th>
          <th scope="col">FaceBook</th>
        </tr>
      </thead>
      <tbody>
        
        @foreach($user_info_blood as $info)
        <tr>
          <th>{{$info->name}}</th>
          <td>{{App\Info::getBloodName($info->blood_group)}}</td>
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
    $('#district').change(function(){
     //   alert("test");
          var id = $('#district').val();
           $.ajax({
           type: 'get',
           url: 'getthana',
           data: {'id': id},

           success: function(result){
          
           console.log(result);

            $('select[name="thana"]').empty();
            $.each(result, function(key, value){
                $('select[name="thana"]').append('<option value="'+ value['id'] +'">' + value['name'] + '</option>');
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

<!--end-main-container-part-->