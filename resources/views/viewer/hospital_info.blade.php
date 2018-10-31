@extends('layouts.viewer_layout.viewer_design');
@Section('content')
<!--main-container-part-->
<div class="row">
    <div class="col-12">
        <nav class="navbar navbar-expand-lg">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#yummyfood-nav" aria-controls="yummyfood-nav" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true"></i> Menu</button>
            <!-- Menu Area Start -->
            <div class="collapse navbar-collapse justify-content-center" id="yummyfood-nav">
            <form name="frm" action="{{URL::to('/hospital-info')}}" method="post" class="form-horizontal" onsubmit="return validateForm">  {{csrf_field()}}
                <ul class="navbar-nav" id="yummy-nav">   
                    
                    &nbsp; &nbsp; &nbsp; 
                    <li class="">
                        <a class="nav-link" >Divison</a>
                        <select style="width:150px" name="divison" id="divison"  class="form-control input-lg dynamic" data-dependent="district" required>
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
                        <select style="width:150px" name="thana" id="thana" required="required" class="form-control input-lg dynamic" required>
                            <option value=""> Select Thana </option>
                        </select>
                    </li>
                    &nbsp; &nbsp; &nbsp;
                    <li class="">
                        <a class="nav-link" >Search</a>
                            <div class="form-actions">
                            &nbsp; &nbsp; &nbsp;<button type="submit" id="submit" class="btn btn-success">Submit</button>
                            </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>


 <div>
      <table class="table table-bordered table-dark">
          <thead>
            <tr>
              <th scope="col">Hospital Name</th>
              <th scope="col">Divison</th>
              <th scope="col">Divison</th>
              <th scope="col">Thana</th>
              <th scope="col">Area</th>
              <th scope="col">Hospital Contact</th>
              <th scope="col">Embulance Contact</th>
            </tr>
          </thead>
          <tbody>
            
            @foreach($service as $s)
            <tr>
              <th>{{$s->hospital_name}}</th>
              <td>{{App\Info::geDivisonName($s->divison)}}</td>
              <td>{{App\Info::geDistrictName($s->district)}}</td>
              <td>{{App\Info::geThanaName($s->thana)}}</td>
              <td>{{$s->area}}</td>
              <td>{{$s->hp_contact}}</td>
              <td>{{$s->emb_contact}}</td>
            </tr>
            @endforeach  
            

          </tbody>
      </table>
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