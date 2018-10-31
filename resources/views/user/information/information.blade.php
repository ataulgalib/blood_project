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
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Update Your Information</h5>
        </div>
        <div class="widget-content nopadding">

          <form action="{{URL::to('/user/add-information')}}"method="post" class="form-horizontal">  {{csrf_field()}}

            <div class="control-group">
              <label class="control-label">Name</label>
              <div class="controls">
                <input type="text" name="name" id="name" class="span11" placeholder="Name"  required/>
              </div>
            </div>

            <div class="control-group">
                <label class="control-label">Blood Gorup</label>
                <div class="controls"> 
                     <select style="width:200px" name="blood" id="blood" class="form-control input-lg dynamic" required>
                        <option value="">Selecte blood</option>
                        @foreach($blood as $div)
                          <option value= "{{$div->id}}"> {{$div->name}} </option>
                        @endforeach
                        </select>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Divison</label>
                <div class="controls"> 
                     <select style="width:200px" name="divison" id="divison" class="form-control input-lg dynamic" data-dependent="district" required>
                        <option value="">Select Divison</option>
                        @foreach($divison as $div)
                          <option value="{{$div->id}}" > {{$div->name}} </option>
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

              </div>
              <div class="control-group">
                <label class="control-label">Thana</label>
                <div class="controls"> 
                     <select style="width:200px" name="thana" id="thana" class="form-control input-lg dynamic"  required>
                     <option value=""> Select Thana </option>
                        </select>
                </div>
              </div>
             
            <div class="control-group">
              <label class="control-label">Area name</label>
              <div class="controls">
                <input type="text" name="area" id="area" class="span11" placeholder="Name" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label"> Emargency Contact </label>
              <div class="controls">
                <input type="text" name="contact" id="contact" class="span11" placeholder="Your Contact Number "  required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Last Donetion Date</label>
              <div class="controls">
                <input type="date" date-formate="dd/mm/yyyy" name="donate_time" id="donate_time" class="span11" placeholder="Last Date of blood Donetion" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">FaceBook Id</label>
              <div class="controls">
                <input type="text" name="url" id="url" class="span11" placeholder="facebook url" required/>
              </div>
            </div>

            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
            </div>

          </form>
          
        </div>
      </div>
    
    </div>
  </div>
</div>

<!-- DropDown_Ajax -->

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