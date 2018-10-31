@extends('layouts.viewer_layout.viewer_design');
@Section('content')


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

 @foreach($content as $c)
<section class="single_blog_area section_padding_80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="row no-gutters">
                                <div class="post-thumb">
                                   
                                  <h2>  {{$c->title_name}}</h2>
                                   
                                </div>
                        <div class="col-10 col-sm-11">
                            <div class="single-post">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                   
                                   <p>  {{$c->content}}</p>
                                    
                                 </div>

                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-meta d-flex">
                                        <div class="post-author-date-area d-flex">
                                            <!-- Post Author -->
                                            <div class="post-author">
                                            {{App\Post::getUserName($c->user_id)}} at  &nbsp;
                                            </div>
                                            <!-- Post Date -->
                                            <div class="post-date">
                                            {{$c->created_at}}
                                            </div>
                                        </div>
                                        <!-- Post Comment & Share Area -->
                                        <div class="post-comment-share-area d-flex">
                                            <div class="post-comments">
                                                <a href="{{URL::to('/view-tips/'.$c->id)}}"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            </div>
                                            <!-- Post Share -->
                                            <div class="post-share">
                                                <a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                        <a href="#"> </a>
                                            <p>Helt-tips</p>
                                    </div>
                                </div> 
                            </div>
                        </div>


                            <!-- Leave A Comment -->
                            <div class="leave-comment-area section_padding_50 clearfix">
                                <div class="comment-form">
                                    <h4 class="mb-30">Leave A Comment</h4>

                                    <!-- Comment Form -->
                                    <form action="{{URL::to('/add-tips-comment/'.$c->id)}}" method="post"> {{csrf_field()}}
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" id="contact-email" placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="comment" id="message" cols="30" rows="10" placeholder="Message" required></textarea>
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