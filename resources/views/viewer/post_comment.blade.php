@extends('layouts.viewer_layout.viewer_design');
@Section('content')


<section class="single_blog_area section_padding_80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="row no-gutters">
                                <div class="post-thumb">
                                   
                                   <p>{{$post->post}} </p>
                                   
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
                                            {{App\Post::getUserName($post->user_id)}} 	&nbsp; 
                                            </div>
                                            <!-- Post Date -->
                                            <div class="post-date">
                                              <p> posted at  	&nbsp; {{$post->created_at}}  </p>
                                            </div>
                                        </div>
                                    </div>  

                                    <!-- Comment show form comment table -->
                                    @foreach($comment as $c)
                                    <div class="">
                                              <p>{{$c->email}} &nbsp;  Wrote &nbsp;  {{$c->comment}}</p>
                                    </div> 
                                    @endforeach

                                </div> 
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
</section>



@endsection;

