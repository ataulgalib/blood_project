@extends('layouts.viewer_layout.viewer_design');
@Section('content')
  
  <!-- for Services. -->
<section class="categories_area clearfix" id="about">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single_catagory wow fadeInUp" data-wow-delay=".6s">
                        <img src="{{asset('image/viewer_img/catagory-img/Articel.jpg')}}" alt="">
                        <div class="catagory-title">
                            <a href="{{URL::to('/view-tips/0')}}">
                                <h5>Articel</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single_catagory wow fadeInUp" data-wow-delay=".9s">
                        <img src="{{asset('image/viewer_img/catagory-img/Service.jpg')}}" alt="">
                        <div class="catagory-title">
                            <a href="{{URL::to('/hospital-info')}}">
                                <h5>Hospital-Info</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single_catagory wow fadeInUp" data-wow-delay=".6s">
                        <img src="{{asset('image/viewer_img/catagory-img/Donner.jpg')}}" alt="">
                        <div class="catagory-title">
                            <a href="{{URL::to('/donner-list')}}">
                                <h5>Donner-Info</h5>
                            </a>
                        </div>
                </div>
            </div>
        </div>
</section>

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

 @foreach($post as $id)
<section class="single_blog_area section_padding_80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="row no-gutters">
                                <div class="post-thumb">
                                   
                                   <p> {{$id->post}}</p>
                                   
                                </div>
                        <div class="col-10 col-sm-11">
                            <div class="single-post">
                                <!-- Post Thumb -->

                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-meta d-flex">
                                        <div class="post-author-date-area d-flex">
                                            <!-- Post Author -->
                                            <div class="post-author">
                                                {{App\Post::getUserName($id->user_id)}} || 
                                            </div>
                                            <!-- Post Date -->
                                            <div class="post-date">
                                                {{$id->created_at}}
                                            </div>
                                        </div>
                                        <!-- Post Comment & Share Area -->
                                        <div class="post-comment-share-area d-flex">
                                            <div class="post-comments">
                                                <a href="{{URL::to('/view-comment/'.$id->id)}}"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            </div>
                                            <!-- Post Share -->
                                            <div class="post-share">
                                                <a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                        <a href="#"> </a>
                                            <p>Blood Help Post</p>
                                    </div>
                                </div> 
                            </div>
                        </div>


                            <!-- Leave A Comment -->
                            <div class="leave-comment-area section_padding_50 clearfix">
                                <div class="comment-form">
                                    <h4 class="mb-30">Leave A Comment</h4>

                                    <!-- Comment Form -->
                                    <form class="comment" action="{{URL::to('/comment/'.$id->id)}}" method="post"> {{csrf_field()}}
                                        <div class="form-group">
                                            <input  type="email" name="email" class="form-control" id="contact-email" placeholder="Email" required/>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="comment" id="message" cols="30" rows="10" placeholder="Message" required ></textarea>
                                        </div>
                                        <button type="submit" class="btn contact-btn">Post Comment</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

     @endforeach
@endsection