@extends('layouts.viewer_layout.viewer_design');
@Section('content')

<div class="row">
    <div class="col-12">
        <nav class="navbar navbar-expand-lg">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#yummyfood-nav" aria-controls="yummyfood-nav" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true"></i> Menu</button>
            <!-- Menu Area Start -->
            <div class="collapse navbar-collapse justify-content-center" id="yummyfood-nav">
            <form name="frm" action="#" method="post" class="form-horizontal">  {{csrf_field()}}
                <ul class="navbar-nav" id="yummy-nav">
                    
   
                    <li class="">
                        <a class="nav-link">Blood Group</a>
                        <select style="width:150px" name="blood" id="blood" class="form-control input-lg dynamic">
                            <option value="">Selecte blood</option>
                                @foreach ($blood as $id) 
                                    <option value="{{$id->id}}">{{$id->name}}</option>
                                @endforeach
                        </select>
                    </li>
                    
                    &nbsp; &nbsp; &nbsp; 
                    <li class="">
                        <a class="nav-link" >Divison</a>
                        <select style="width:150px" name="divison" id="divison" class="form-control input-lg dynamic" data-dependent="district" required>
                            <option value="">Select Divison</option>
                                @foreach ($divison as $id) 
                                    <option value="{{$id->id}}">{{$id->name}}</option>
                                @endforeach
                        </select>
                    </li>
                    &nbsp; &nbsp; &nbsp; 
                    <li class="">
                        <a class="nav-link" >District</a>
                        <select style="width:150px" name="district" id="district" class="form-control input-lg dynamic" data-dependent="thana" required>
                            <option value="">Select District</option>

                        </select>
                    </li>
                    &nbsp; &nbsp; &nbsp; 
                    <li class="">
                        <a class="nav-link" >thana</a>
                        <select style="width:150px" name="thana" id="thana" class="form-control input-lg dynamic" required>
                            <option value=""> Select Thana </option>
                        </select>
                    </li>
                    &nbsp; &nbsp; &nbsp;
                    <li class="">
                        <a class="nav-link" >Search</a>
                            <div class="form-actions">
                            &nbsp; &nbsp; &nbsp;<button type="submit" class="btn btn-success">Submit</button>
                            </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

  <div class="navbar navbar-expand-lg">
      <table class="table table-bordered table-dark">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Blood Group</th>
              <th scope="col">Divison</th>
              <th scope="col">District</th>
              <th scope="col">Thana</th>
              <th scope="col">Area</th>
              <th scope="col">Last Donnation</th>
              <th scope="col">Email</th>
              <th scope="col">FaceBook</th>
            </tr>
          </thead>
          <tbody>
            
          @foreach ($user_info_blood as $id) 
            <tr>
            
              <td>{{$id->name}}</td>
              <td>{{App\Info::getBloodName($id->blood_group)}}</td>
              <td>{{App\Info::geDivisonName($id->divison)}}</td>
              <td>{{App\Info::geDistrictName($id->district)}}</td>
              <td>{{App\Info::geThanaName($id->thana)}}</td>
              <td>{{$id->area}}</td>
              <td>{{$id->last_date_donation}}</td>
              <td>{{App\Info::getEmail($id->user_id)}}</td>
              <td>{{$id->facebook_url}}</td>
       
            </tr>
        @endforeach
          

          </tbody>
      </table>
    </div>
    <p align="center"> Please Sign In or Sign up to donner phone number </p>
  </div>   

<!-- DropDown_Ajax -->

<script> 
    $(document).ready(function(){
        
        $('#divison').change(function(){
           // alert("hi");
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