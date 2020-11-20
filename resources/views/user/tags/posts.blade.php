@extends('layouts.app')
@section('title'|'Tag Articles')

@section('content')
@include('partials.tagnews')
  <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">
          @if(!empty($tagPosts))
               @forelse($tagPosts as $pic)
          <div class="single_iteam"> 
            <a href="{!! $pic->path() !!}"> 
              <img src="{!! $pic->imageUrl() !!}" alt="{!! $pic->title !!}"/>
            </a>
            <div class="slider_article">
              <h2>
                <a class="slider_tittle" href="{!! $pic->path() !!}">
                  {!! $pic->title !!}
                </a>
              </h2>
              <p>
                {!! $pic->excerpt !!} ...
                <a href="{!! $pic->path() !!}">
                  <i style="color: lightblue;">Read More</i>
                </a>
              </p>
            </div>
          </div>
          @empty
            <p style="color: blue;font-size: 20px">Sorry esteemed viewer, We are yet to post 
              <span style="color: red;margin: 5px"> {!! $tag->name !!} Articles</span>
            </p>
          @endforelse
          @endif
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Latest {!! $tag->name !!} News</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
              <li>
                @foreach($tagPostsSide as $ar)
                <div class="media"> 
                  <a href="{!! $ar->path() !!}" class="media-left"> 
                    <img src="{!! $ar->imageUrl() !!}" alt="{!! $ar->title !!}"/> 
                  </a>
                  <div class="media-body"> 
                    <a href="{!! $ar->path() !!}" class="catg_title">
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
                    <a href="{!! $pac->path() !!}" class="featured_img"> 
                      <img src="{!! $pac->imageUrl() !!}" alt="{!! $pac->title !!}"/> 
                      <span class="overlay"></span> 
                    </a>
                    <figcaption> 
                      <a href="{!! $pac->path() !!}">{!! $pac->title !!}</a> 
                    </figcaption>
                    <p>
                      {!! $pac->excerpt !!} ...
                      <a href="{!! $pac->path() !!}">
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
                    <a href="{!! $arcs->path() !!}" class="media-left"> 
                      <img src="{!! $arcs->imageUrl() !!}" alt="{!! $arcs->title !!}"/> 
                    </a>
                    <div class="media-body"> 
                      <a href="{!! $arcs->path() !!}" class="catg_title">
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
            <h2><span>{{$politicsCart->name}} News</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav">
                @if(!empty($politicsNews))
                  @foreach($politicsNews as $pol)
                <li>
                  <figure class="bsbig_fig  wow fadeInDown"> 
                    <a class="featured_img" href="{!! $pol->path() !!}"> 
                      <img src="{!! $pol->imageUrl() !!}" alt="{!! $pol->title !!}"> 
                      <span class="overlay"></span> 
                    </a>
                    <figcaption> 
                      <a href="{!! $pol->path() !!}">{!! $pol->title !!}</a> 
                    </figcaption>
                    <p>
                      {!! $pol->excerpt !!} ...
                      <a href="{!! $pol->path() !!}">
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
                    <a href="{!! $mas->path() !!}" class="media-left"> 
                      <img src="{!! $mas->imageUrl() !!}" alt="{!! $mas->title !!}"/> 
                    </a>
                    <div class="media-body"> 
                      <a href="{!! $mas->path() !!}" class="catg_title">
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
            <h2><span>{{$sportsCart->name}} News</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav">
                @if(!empty($sportsNews))
                  @foreach($sportsNews as $sp)
                <li>
                  <figure class="bsbig_fig  wow fadeInDown"> 
                    <a class="featured_img" href="{!! $sp->path() !!}"> 
                      <img src="{!! $sp->imageUrl() !!}" alt="{!! $sp->title !!}"> 
                      <span class="overlay"></span> 
                    </a>
                    <figcaption> 
                      <a href="{!! $sp->path() !!}">{!! $sp->title !!}</a> 
                    </figcaption>
                    <p>
                      {!! $sp->excerpt !!} ...
                      <a href="{!! $sp->path() !!}">
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
                    <a href="{!! $spac->path() !!}" class="media-left"> 
                      <img src="{!! $spac->imageUrl() !!}" alt="{!! $spac->title !!}"/> 
                    </a>
                    <div class="media-body"> 
                      <a href="{!! $spac->path() !!}" class="catg_title">
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


