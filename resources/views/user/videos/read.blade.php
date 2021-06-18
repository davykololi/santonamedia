@extends('layouts.app')
 
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
            <h1><a href="{!! $video->path() !!}">{{$video->title}}</a></h1>
            <div class="post_commentbox"> 
              <a href="{!! $video->path() !!}">
                <i class="fa fa-user"></i>Wpfreeware
              </a> 
              <span><i class="fa fa-calendar"></i>Posted On: {!! $video->created_at->toDayDateTimeString() !!}</span> 
              <a href="{!! $category->path() !!}"><i class="fa fa-tags"></i>
                {!! $video->category->name !!}
              </a> 
              <span>Article By:</span>
              <a href="{!! $video->admin->videoPath() !!}">
                <span style="margin: 5px;color: #696969"> 
                  <b>{!! $video->admin->name !!}</b>
                  <img class="author-img" src="/storage/public/storage/{!! $video->admin->image !!}" alt="{!! $video->admin->name !!}">
                </span>
              </a>  
            </div>
            <div class="single_page_content"> 
              <figure>
                <video width="512" height="288" controls> 
                  <source type="video/mp4" src="{!! $video->videoUrl() !!}" alt="{!! $video->title !!}">
                  <source type="video/ogg" src="{!! $video->videoUrl() !!}" alt="{!! $video->title !!}">  
                  <source type="video/webm" src="{!! $video->videoUrl() !!}" alt="{!! $video->title !!}"> 
                  This browser doesn't support video tag.
                </video>
                <figcaption class="video-caption"> {!! $video->caption !!} </figcaption>
              </figure>
              <p class="summary">
                <b><u style="margin: 5px">Summary:</u></b>
                <i>{!! $video->description !!}</i>
              </p>
              <p>{!! $video->content !!}</p>

              @include('user.videos.commentForm')
              @include('user.videos.commentsDisplay')
            </div>
            @include('partials.share')
            <div class="related_post">
              <h2>Related Video <i class="fa fa-thumbs-o-up"></i></h2>
              <ul class="spost_nav wow fadeInDown animated">
                @foreach($category->videos as $vida)
                <li>
                  <div class="media"> 
                    <figure>
                    <video width="150" height="84.5" controls> 
                      <source type="video/mp4" src="{!! $vida->videoUrl() !!}" alt="{!! $vida->title !!}">
                      <source type="video/ogg" src="{!! $vida->videoUrl() !!}" alt="{!! $vida->title !!}">
                      <source type="video/webm" src="{!! $vida->videoUrl() !!}" alt="{!! $vida->title !!}"> 
                        This browser doesn't support video tag.
                      </video>
                      </figure>
                    <div class="media-body"> <a class="catg_title" href="{!! $vida->path() !!}">{!! $vida->title !!}</a> </div>
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
        </a> 
      </nav>
        @include('partials.videos_readext')
        @include('partials.aside_videoextension')
    </div>
  </section>
@endsection
