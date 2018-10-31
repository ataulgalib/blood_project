@extends('layouts.viewer_layout.viewer_design');
@Section('content')

    <section class="single_blog_area section_padding_80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="row no-gutters">
                        <!-- Single Post -->
                        <div class="col-10 col-sm-11">
                            <div class="single-post">
                                <div class="post-content">
                                    <div class="post-meta d-flex">
                                        <div class="post-author-date-area d-flex">
                                        </div>
                                </div> 
                            </div>
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

                            <!-- Leave A Comment -->
                            <div class="leave-comment-area section_padding_50 clearfix">
                                <div class="comment-form">
                                    <h4 class="mb-30">Registration</h4>
                                    <div class="container">
                                        <form class="form-horizontal" method="post" action="{{URL::to('/signup')}}">{{csrf_field()}}
                                          <div class="form-group" >
                                            <label class="control-label col-sm-2" for="">Name</label>
                                            <div class="col-sm-10">
                                              <input style="width:400px" type="name" class="form-control" id="name" placeholder="Enter your name" name="name" required/>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-2" for="email">Email</label>
                                            <div class="col-sm-10">
                                              <input type="email" style="width:400px" class="form-control" id="email" placeholder="Enter email" name="email" required/>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-2" for="pwd">Password</label>
                                            <div class="col-sm-10">
                                              <input type="password" style="width:400px" class="form-control" id="password" placeholder="Enter password" name="password1" required/>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-2" for="pwd">Re-Password</label>
                                            <div class="col-sm-10">          
                                              <input type="password"  style="width:400px" class="form-control" id="password" placeholder="retype" name="password2" required/>
                                            </div>
                                          </div>
                                          <div class="form-group">        
                                            <div class="col-sm-offset-2 col-sm-10">
                                              <button type="submit" class="btn btn-default">Submit</button>
                                            </div>
                                          </div>
                                        </form>
                                      </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection;