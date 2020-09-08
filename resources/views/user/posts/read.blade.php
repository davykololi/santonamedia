@extends('layouts.app')

@section('title')
@parent
{{$post->title}}
@stop
 
@section('content')
@include('partials.allnews')
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
            <h1><a href="{!! route('users.posts.read',['post_slug' => $post->slug]) !!}">{!! $post->title !!}</a></h1>
            <div class="post_commentbox"> 
              <a href="{!! route('users.posts.read',['post_slug' => $post->slug]) !!}">
                <i class="fa fa-user"></i>Wpfreeware
              </a> 
              <span><i class="fa fa-calendar"></i>{!! date('d/m/Y H:i:s') !!}</span> 
              <a href="{!! route('category.articles',['slug' => $category->slug]) !!}"><i class="fa fa-tags"></i>
                {!! $post->category->name !!}
              </a> 
              <span>Article By:</span>
              <a href="{!! route('author.posts',['slug' => $post->admin->slug]) !!}">
                <span style="margin: 5px;color: #696969"> 
                  <b>{!! $post->admin->name !!}</b>
                  <img style="width: 5%;margin: 10px;border-radius: 50%" src="/storage/public/storage/{!! $post->admin->image !!}" alt="{!! $post->admin->name !!}">
                </span>
              </a> 
            </div>
            <div class="single_page_content"> 
              <img class="img-center" src="/storage/public/storage/{!! $post->image !!}" alt="{!! $post->title !!}">
              <p class="img-center" style="color: gray;font-size: 16px">{!! $post->caption !!}</p>
              <p style="text-align: justify-all;color:;background-color: lightgray;border-radius: 10px">
                <b><u style="margin: 5px">Summary:</u></b>
                <i>{!! $post->summary !!}</i>
              </p>
              <p style="text-align: justify;">{!! $post->content !!}</p>

              @include('user.posts.commentForm')
              @include('user.posts.commentsDisplay')
              <blockquote> Donec volutpat nibh sit amet libero ornare non laoreet arcu luctus. Donec id arcu quis mauris euismod placerat sit amet ut metus. Sed imperdiet fringilla sem eget euismod. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque adipiscing, neque ut pulvinar tincidunt, est sem euismod odio, eu ullamcorper turpis nisl sit amet velit. Nullam vitae nibh odio, non scelerisque nibh. Vestibulum ut est augue, in varius purus. </blockquote>
            </div>
            @include('partials.share')
            <div class="related_post">
              <h2>Related Post <i class="fa fa-thumbs-o-up"></i></h2>
              <ul class="spost_nav wow fadeInDown animated">
                @foreach($categoryPosts as $xv)
                <li>
                  <div class="media"> <a class="media-left" href="{!! route('users.posts.read',['post_slug' => $xv->slug]) !!}"> <img src="/storage/public/storage/{!! $xv->image !!}" alt="{!! $xv->title !!}"> </a>
                    <div class="media-body"> <a class="catg_title" href="{!! route('users.posts.read',['post_slug' => $xv->slug]) !!}">{!! $xv->title !!}</a> </div>
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
          <img src="../images/post_img1.jpg" alt=""/> </div>
        </a> <a class="next" href="#"> <span class="icon-wrap"><i class="fa fa-angle-right"></i></span>
        <div>
          <h3>Street Hills</h3>
          <img src="../images/post_img1.jpg" alt=""/> </div>
        </a> </nav>
      @include('partials.posts_readext')
    </div>
  </section>
@endsection
