@extends('layouts.app')
@section('title'|'Admin Articles')

@section('content')
@include('partials.adminnews')
  <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">
          @if(!empty($adminPosts))
               @forelse($adminPosts as $pic)
          <div class="single_iteam"> 
            <a href="{!! route('users.posts.read',['post_slug' => $pic->slug]) !!}"> 
              <img src="/storage/public/storage/{!! $pic->image !!}" alt="{!! $pic->title !!}"/>
            </a>
            <div class="slider_article">
              <h2>
                <a class="slider_tittle" href="{!! route('users.posts.read',['post_slug' => $pic->slug]) !!}">
                  {!! $pic->title !!}
                </a>
              </h2>
              <p>
                {!! Illuminate\Support\Str::limit(strip_tags($pic->content),200,'...') !!}
                <a href="{!! route('users.posts.read',['post_slug' => $pic->slug]) !!}"/>
                  <i style="color: lightblue;">Read More</i>
                </a>
              </p>
            </div>
          </div>
          @empty
            <p style="color: blue;font-size: 20px">Sorry esteemed viewer, We are yet to post 
              <span style="color: red;margin: 5px"> {!! $admin->name !!} Articles</span>
            </p>
          @endforelse
          @endif
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2>
            <span>
              Latest {!! $admin->name !!}'s Articles 
              <a href="{!! route('author.posts',['slug' => $admin->slug]) !!}">
                <img style="width: 8%;margin: 10px;border-radius: 50%" src="/storage/public/storage/{!! $admin->image !!}" alt="{!! $admin->name !!}">
              </a>
            </span>
          </h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
              <li>
                @foreach($adminPostsSide as $ar)
                <div class="media"> 
                  <a href="{!! route('users.posts.read', ['post_slug' => $ar->slug]) !!}" class="media-left"> 
                    <img alt="{!! $ar->title !!}" src="/storage/public/storage/{!! $ar->image !!}"/> 
                  </a>
                  <div class="media-body"> 
                    <a href="{!! route('users.posts.read', ['post_slug' => $ar->slug]) !!}" class="catg_title">
                      {!! $ar->title !!}
                    </a> 
                  </div>
                </div>
                @endforeach
              </li>
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
            <h2><span>General News</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                @if(!empty($allPosts))
                  @foreach($allPosts as $pac)
                <li>
                  <figure class="bsbig_fig"> 
                    <a href="{!! route('users.posts.read', ['post_slug' => $pac->slug]) !!}" class="featured_img"> 
                      <img alt="{!! $pac->title !!}" src="/storage/public/storage/{!! $pac->image !!}"/> 
                      <span class="overlay"></span> 
                    </a>
                    <figcaption> 
                      <a href="{!! route('users.posts.read', ['post_slug' => $pac->slug]) !!}">{!! $pac->title !!}</a> 
                    </figcaption>
                    <p>
                      {!! Illuminate\Support\Str::limit(strip_tags($pac->content),200,'...') !!}
                      <a href="{!! route('users.posts.read',['post_slug' => $pac->slug]) !!}">
                        <i style="color: lightblue;">Read More</i>
                      </a>
                    </p>
                  </figure>
                </li>
                  @endforeach
                @endif
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
                @if(!empty($allpostSides))
                  @foreach($allpostSides as $arcs)
                <li>
                  <div class="media wow fadeInDown"> 
                    <a href="{!! route('users.posts.read', ['post_slug' => $arcs->slug]) !!}" class="media-left"> 
                      <img alt="{!! $arcs->title !!}" src="/storage/public/storage/{!! $arcs->image !!}"/> 
                    </a>
                    <div class="media-body"> 
                      <a href="{!! route('users.posts.read', ['post_slug' => $arcs->slug]) !!}" class="catg_title">
                        {!! $arcs->title !!}
                      </a> 
                    </div>
                  </div>
                </li>
                @endforeach
                @endif
              </ul>
            </div>
          </div> <!-- end of single post content -->
          <div class="single_post_content"> <!-- start of single post content -->
            <h2><span>Politics News</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav">
                @if(!empty($politicsNews))
                  @foreach($politicsNews as $pol)
                <li>
                  <figure class="bsbig_fig  wow fadeInDown"> 
                    <a class="featured_img" href="{!! route('users.posts.read', ['post_slug' => $pol->slug]) !!}"> 
                      <img src="/storage/public/storage/{!! $pol->image !!}" alt="{!! $pol->title !!}"> 
                      <span class="overlay"></span> 
                    </a>
                    <figcaption> 
                      <a href="{!! route('users.posts.read', ['post_slug' => $pol->slug]) !!}">{!! $pol->title !!}</a> 
                    </figcaption>
                    <p>
                      {!! Illuminate\Support\Str::limit(strip_tags($pol->content),200,'...') !!}
                      <a href="{!! route('users.posts.read',['post_slug' => $pol->slug]) !!}">
                        <i style="color: lightblue;">Read More</i>
                      </a>
                    </p>
                  </figure>
                </li>
                  @endforeach
                @endif
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
                @if(!empty($politicSides))
                  @foreach($politicSides as $mas)
                <li>
                  <div class="media wow fadeInDown"> 
                    <a href="{!! route('users.posts.read', ['post_slug' => $mas->slug]) !!}" class="media-left"> 
                      <img alt="{!! $mas->title !!}" src="/storage/public/storage/{!! $mas->image !!}"/> 
                    </a>
                    <div class="media-body"> 
                      <a href="{!! route('users.posts.read', ['post_slug' => $mas->slug]) !!}" class="catg_title">
                        {!! $mas->title !!}
                      </a> 
                    </div>
                  </div>
                </li>
                  @endforeach
                @endif
              </ul>
            </div>
          </div> <!-- end of single post content -->
          <div class="single_post_content"> <!-- start of single post content -->
            <h2><span>Sports News</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav">
                @if(!empty($sportsNews))
                  @foreach($sportsNews as $sp)
                <li>
                  <figure class="bsbig_fig  wow fadeInDown"> 
                    <a class="featured_img" href="{!! route('users.posts.read', ['post_slug' => $sp->slug]) !!}"> 
                      <img src="/storage/public/storage/{!! $sp->image !!}" alt="{!! $sp->title !!}"> 
                      <span class="overlay"></span> 
                    </a>
                    <figcaption> 
                      <a href="{!! route('users.posts.read', ['post_slug' => $sp->slug]) !!}">{!! $sp->title !!}</a> 
                    </figcaption>
                    <p>
                      {!! Illuminate\Support\Str::limit(strip_tags($sp->content),200,'...') !!}
                      <a href="{!! route('users.posts.read',['post_slug' => $sp->slug]) !!}">
                        <i style="color: lightblue;">Read More</i>
                      </a>
                    </p>
                  </figure>
                </li>
                  @endforeach
                @endif
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
                @if(!empty($spSides))
                  @foreach($spSides as $spac)
                <li>
                  <div class="media wow fadeInDown"> 
                    <a href="{!! route('users.posts.read', ['post_slug' => $spac->slug]) !!}" class="media-left"> 
                      <img alt="{!! $spac->title !!}" src="/storage/public/storage/{!! $spac->image !!}"> 
                    </a>
                    <div class="media-body"> 
                      <a href="{!! route('users.posts.read', ['post_slug' => $spac->slug]) !!}" class="catg_title">
                        {!! $spac->title !!}
                      </a> 
                    </div>
                  </div>
                </li>
                  @endforeach
                @endif
              </ul>
            </div>
          </div> <!-- end of single post content -->
          @include('user.posts.tags')
          @include('user.newsletter.newsletter')
          <br/><br/>
        </div>
      </div>
      @include('partials.aside_postextension')
    </div>
  </section>
@endsection


