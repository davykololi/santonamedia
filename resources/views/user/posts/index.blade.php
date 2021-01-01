@extends('layouts.app')
@section('title'|'Articles')

@section('content')
@include('partials.catnews')
  <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">
          @if(!empty($categoryPosts))
               @forelse($categoryPosts as $tu)
          <div class="single_iteam"> 
            <a href="{!! $tu->path() !!}"> 
              <img src="{!! $tu->imageUrl() !!}" alt="{!! $tu->title !!}"/>
            </a>
            <div class="slider_article">
              <h2>
                <a class="slider_tittle" href="{!! $tu->path() !!}">
                  {!! $tu->title !!}
                </a>
              </h2>
              <p>
                {!! $tu->excerpt !!} ...
                <a href="{!! $tu->path() !!}">
                  <i style="color: lightblue;">Read More</i>
                </a>
              </p>
            </div>
          </div>
          @empty
          <p style="color: green;font-size: 20px">Sorry esteemed viewer, We are yet to post 
            <span style="color: red;margin: 5px"> {!! $category->name !!} Articles. </span>
            Stay tuned.
          </p>
          @endforelse
          @endif
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Latest {!! $category->name !!} Articles</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
              <li>
                @foreach($catPostsSide as $nr)
                <div class="media"> 
                  <a href="{!! $nr->path() !!}" class="media-left"> 
                    <img src="{!! $nr->imageUrl() !!}" alt="{!! $nr->title !!}"/> 
                  </a>
                  <div class="media-body"> 
                    <a href="{!! $nr->path() !!}" class="catg_title">
                      {!! $nr->title !!}
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
          <div class="single_post_content"><!-- Start of a single post -->
            <h2><span>Latest News</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                @if(!empty($allPosts))
                  @foreach($allPosts as $p)
                <li>
                  <figure class="bsbig_fig"> 
                    <a href="{!! $p->path() !!}" class="featured_img"> 
                      <img src="{!! $p->imageUrl() !!}" alt="{!! $p->title !!}"/> 
                      <span class="overlay"></span> 
                    </a>
                    <figcaption> 
                      <a href="{!! $p->path() !!}">{!! $p->title !!}</a> </figcaption>
                    <p>
                      {!! $p->excerpt !!} ...
                      <a href="{!! $p->path() !!}">
                        <i style="color: black">Read More</i></a>
                    </p>
                  </figure>
                </li>
                  @endforeach
                @endif
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
                @if(!empty($allSides))
                  @foreach($allSides as $arch)
                <li>
                  <div class="media wow fadeInDown"> 
                    <a href="{!! $arch->path() !!}" class="media-left"> 
                      <img src="{!! $arch->imageUrl() !!}" alt="{!! $arch->title !!}"/> 
                    </a>
                    <div class="media-body"> 
                      <a href="{!! $arch->path() !!}" class="catg_title">
                        {!! $arch->title !!}
                      </a> 
                    </div>
                  </div>
                </li>
                @endforeach
                @endif
              </ul>
            </div>
          </div> <!-- end of single content -->
          <div class="single_post_content"><!-- Start of a single post -->
            <h2><span>{!! $poliCart->name !!} News</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                @if(!empty($politicArticles))
                  @foreach($politicArticles as $art)
                <li>
                  <figure class="bsbig_fig"> 
                    <a href="{!! $art->path() !!}" class="featured_img"> 
                      <img src="{!! $art->imageUrl() !!}" alt="{!! $art->title !!}"/> 
                      <span class="overlay"></span> 
                    </a>
                    <figcaption> 
                      <a href="{!! $art->path() !!}">{!! $art->title !!}</a>
                    </figcaption>
                    <p>
                      {!! $art->excerpt !!} ...
                      <a href="{!! $art->path() !!}">
                        <i style="color: black">Read More</i></a>
                    </p>
                  </figure>
                </li>
                  @endforeach
                @endif
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
                @if(!empty($poliSides))
                  @foreach($poliSides as $sd)
                <li>
                  <div class="media wow fadeInDown"> 
                    <a href="{!! $sd->path() !!}" class="media-left"> 
                      <img src="{!! $sd->imageUrl() !!}" alt="{!! $sd->title !!}"/> 
                    </a>
                    <div class="media-body"> 
                      <a href="{!! $sd->path() !!}" class="catg_title">
                        {!! $sd->title !!}
                      </a> 
                    </div>
                  </div>
                </li>
                @endforeach
                @endif
              </ul>
            </div>
          </div> <!-- end of single content -->

          <div class="single_post_content"> <!-- start of single post content -->
            <h2><span>{!! $sportCart->name !!} News</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav">
                @if(!empty($sportNews))
                  @foreach($sportNews as $spt)
                <li>
                  <figure class="bsbig_fig  wow fadeInDown"> 
                    <a class="featured_img" href="{!! $spt->path() !!}"> 
                      <img src="{!! $spt->imageUrl() !!}" alt="{!! $spt->title !!}"> 
                      <span class="overlay"></span> 
                    </a>
                    <figcaption> 
                      <a href="{!! $spt->path() !!}">{!! $spt->title !!}</a> 
                    </figcaption>
                    <p>
                      {!! $spt->excerpt !!} ...
                      <a href="{!! $spt->path() !!}">
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
                @if(!empty($sportSides))
                  @foreach($sportSides as $sid)
                <li>
                  <div class="media wow fadeInDown"> 
                    <a href="{!! $sid->path() !!}" class="media-left"> 
                      <img src="{!! $sid->imageUrl() !!}" alt="{!! $sid->title !!}"/> 
                    </a>
                    <div class="media-body"> 
                      <a href="{!! $sid->path() !!}" class="catg_title">
                        {!! $sid->title !!}
                      </a> 
                    </div>
                  </div>
                </li>
                  @endforeach
                @endif
              </ul>
            </div>
          </div> <!-- end of single post content -->
          
          <div class="single_post_content">
            <h2><span>Videos</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav">
                @if(!empty($videos))
                @foreach($videos as $vx)
                <li>
                  <figure class="bsbig_fig  wow fadeInDown">  
                      <video width="256" height="144" controls> 
                        <source type="video/mp4" src="{!! $vx->videoUrl() !!}" alt="{!! $vx->title !!}">
                        <source type="video/ogg" src="{!! $vx->videoUrl() !!}" alt="{!! $vx->title !!}"> 
                        <source type="video/webm" src="{!! $vx->videoUrl() !!}" alt="{!! $vx->title !!}">
                        This browser doesn't support video tag.
                      </video>
                      <figcaption>
                        <a href="{!! $vx->path() !!}">
                          {!! $vx->title !!}
                        </a>
                      </figcaption>
                    <p>
                      <a href="{!! $vx->path() !!}">
                        {!! $vx->excerpt !!} ... <i style="color: lightblue;">Read More</i>
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
                @foreach($videoSides as $sac)
                <li>
                  <div class="media wow fadeInDown"> 
                    <video width="150" height="84.5" controls> 
                      <source type="video/mp4" src="{!! $sac->videoUrl() !!}" alt="{!! $sac->title !!}">
                      <source type="video/ogg" src="{!! $sac->videoUrl() !!}" alt="{!! $sac->title !!}"> 
                      <source type="video/webm" src="{!! $sac->videoUrl() !!}" alt="{!! $sac->title !!}">
                      This browser doesn't support video tag.
                    </video>
                    <div class="media-body"> 
                      <a href="{!! $sac->path() !!}" class="catg_title"> 
                        {!! $sac->title !!}
                      </a> 
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
      @include('partials.aside_postextension')
    </div>
  </section>
@endsection


