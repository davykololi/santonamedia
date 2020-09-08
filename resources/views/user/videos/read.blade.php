@extends('layouts.app')

@section('title')
@parent
{{$video->title}}
@stop
 
@section('content')
@include('partials.videosection')
<section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">
            <ol class="breadcrumb">
              <li><a href="{!! url('/') !!}">Home</a></li>
              <li><a href="#">Technology</a></li>
              <li class="active">Mobile</li>
            </ol>
            <h1><a href="{!! route('users.videos.read',['video_slug' => $video->slug]) !!}">{{$video->title}}</a></h1>
            <div class="post_commentbox"> 
              <a href="{!! route('users.videos.read',['video_slug' => $video->slug]) !!}">
                <i class="fa fa-user"></i>Wpfreeware
              </a> 
              <span><i class="fa fa-calendar"></i>{!! date('d/m/Y H:i:s') !!}</span> 
              <a href="{!! route('category.videos',['slug' => $category->slug]) !!}"><i class="fa fa-tags"></i>
                {!! $video->category->name !!}
              </a> 
              <span>Article By:</span>
              <a href="{!! route('author.videos',['slug' => $video->admin->slug]) !!}">
                <span style="margin: 5px;color: #696969"> 
                  <b>{!! $video->admin->name !!}</b>
                  <img style="width: 5%;margin: 10px;border-radius: 50%" src="/storage/public/storage/{!! $video->admin->image !!}" alt="{!! $video->admin->name !!}">
                </span>
              </a>  
            </div>
            <div class="single_page_content"> 
              <figure>
                <video width="512" height="288" controls> 
                  <source type="video/mp4" src="/storage/public/videos/{!! $video->video !!}" alt="{!! $video->title !!}">
                  <source type="video/ogg" src="/storage/public/videos/{!! $video->video !!}" alt="{!! $video->title !!}">  
                  <source type="video/webm" src="/storage/public/videos/{!! $video->video !!}" alt="{!! $video->title !!}"> 
                  This browser doesn't support video tag.
                </video>
                <figcaption class="figcaption"> {!! $video->caption !!} </figcaption>
              </figure>
              <br/>
              <p>{!! $video->content !!}</p>

              @include('user.videos.commentForm')
              @include('user.videos.commentsDisplay')
              <blockquote> Donec volutpat nibh sit amet libero ornare non laoreet arcu luctus. Donec id arcu quis mauris euismod placerat sit amet ut metus. Sed imperdiet fringilla sem eget euismod. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque adipiscing, neque ut pulvinar tincidunt, est sem euismod odio, eu ullamcorper turpis nisl sit amet velit. Nullam vitae nibh odio, non scelerisque nibh. Vestibulum ut est augue, in varius purus. </blockquote>
            </div>
            @include('partials.share')
            <div class="related_post">
              <h2>Related Video <i class="fa fa-thumbs-o-up"></i></h2>
              <ul class="spost_nav wow fadeInDown animated">
                @foreach($category->videos as $vida)
                <li>
                  <div class="media"> 
                    <figure>
                    <video width="150" height="84.5" controls poster="{!! asset('/static/lion.JPG') !!}"> 
                      <source type="video/mp4" src = "/storage/public/videos/{!! $vida->video !!}" alt="{!! $vida->title !!}">
                      <source type="video/ogg" src="/storage/public/videos/{!! $vida->video !!}" alt="{!! $vida->title !!}">
                      <source type="video/webm" src="/storage/public/videos/{!! $vida->video !!}" alt="{!! $vida->title !!}"> 
                        This browser doesn't support video tag.
                      </video>
                      </figure>
                    <div class="media-body"> <a class="catg_title" href="{!! route('users.videos.read',['video_slug' => $vida->slug]) !!}">{!! $vida->title !!}</a> </div>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
              @include('user.videos.tags')
              @include('user.newsletter.newsletter')
              <br/><br/>
          </div>
        </div>
      </div>
      <nav class="nav-slit"> <a class="prev" href="#"> <span class="icon-wrap"><i class="fa fa-angle-left"></i></span>
        <div>
          <h3>City Lights</h3>
          <img src="../images/post_img1.jpg" alt=""/> </div>
        </a> <a class="next" href="#"> <span class="icon-wrap"><i class="fa fa-angle-right"></i></span>
        <div>
          <h3>Street Hills</h3>
          <img src="../images/post_img1.jpg" alt=""/> </div>
        </a> </nav>
        @include('partials.aside_videoextension')
    </div>
  </section>
@endsection
