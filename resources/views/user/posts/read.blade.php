@extends('layouts.app')
 
@section('content')
@include('partials.allnews')
<section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">
            <ol class="breadcrumb">
              <li><a href="{!! url('/') !!}">Home</a></li>
              <li><a href="{!! $category->path() !!}">{{$category->name}}</a></li>
            </ol>
            <h1>{!! $post->title !!}</h1>
            <div class="post_commentbox"> 
              <a href="{!! $post->path() !!}">
                <i class="fa fa-user"></i>Wpfreeware
              </a> 
              <span><i class="fa fa-calendar"></i>Posted On: {!! $post->created_at->toDayDateTimeString() !!}</span> 
              <a href="{!! $category->path() !!}"><i class="fa fa-tags"></i>
                {!! $post->category->name !!}
              </a> 
              <span>Article by:</span>
              <a href="{!! $post->admin->path() !!}">
                <span style="margin: 5px;color: #696969"> 
                  <b>{!! $post->admin->name !!}</b>
                  <img class="author-img" src="/storage/public/storage/{!! $post->admin->image !!}" alt="{!! $post->admin->name !!}">
                </span>
              </a> 
            </div>
            <div class="single_page_content" style="float: left;margin: 2px"> 
                <img class="img-center" src="{!! $post->imageUrl() !!}" alt="{!! $post->title !!}">
                <span class="post-caption" style="text-align: center;">
                  {!! $post->caption !!}
                </span>
              <p class="summary">
                <b><u style="margin: 5px">Summary:</u></b>
                <i style="padding: 10px">{!! $post->description !!}</i>
              </p>
              <p>{!! $post->content !!}</p>

              @include('user.posts.commentForm')
              @include('user.posts.commentsDisplay')
            </div>
            @include('partials.share')
            <div class="related_post">
              <h2>Related Post <i class="fa fa-thumbs-o-up"></i></h2>
              <ul class="spost_nav wow fadeInDown animated">
                @foreach($categoryPosts as $xv)
                <li>
                  <div class="media"> 
                    <a class="media-left" href="{!! $xv->path() !!}"> 
                      <img src="{!! $xv->imageUrl() !!}" loading="lazy" alt="{!! $xv->title !!}"> 
                    </a>
                    <div class="media-body"> 
                      <a class="catg_title" href="{!! $xv->path() !!}">
                        {!! $xv->title !!}
                      </a> 
                      <p><i>{!! $xv->created_date !!}</i></p>
                    </div>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
          @include('user.posts.tags')
          @include('user.newsletter.newsletter')
          <br/><br/>
        </div>
      </div>
      <nav class="nav-slit"> <a class="prev" href="#"> <span class="icon-wrap"><i class="fa fa-angle-left"></i></span>
        <div>
          <h3>City Lights</h3>
          <img src="{{asset('/static/globe.png')}}" loading="lazy" alt="Logo"/> </div>
        </a> <a class="next" href=""> <span class="icon-wrap"><i class="fa fa-angle-right"></i></span>
        <div>
          <h3>Web Developer 0724351952</h3>
          <img src="{{asset('/static/David Kololi.JPG')}}" loading="lazy" alt="Web Developer"/> </div>
        </a> </nav>
      @include('partials.posts_readext')
      @include('partials.aside_postextension')
    </div>
  </section>
@endsection
