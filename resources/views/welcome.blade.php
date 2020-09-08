@extends('layouts.app')
@section('title'|'News')

@section('content')
  @include('partials.allnews')
  <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">
          @if(!empty($allPosts))
               @foreach($allPosts as $c)
          <div class="single_iteam"> 
            <a href="{!! route('users.posts.read',['post_slug' => $c->slug]) !!}"> 
              <img src="/storage/public/storage/{!! $c->image !!}" alt="{!! $c->title !!}"/>
            </a>
            <div class="slider_article">
              <h2>
                <a class="slider_tittle" href="{!! route('users.posts.read',['post_slug' => $c->slug]) !!}">
                  {!! $c->title !!}
                </a>
              </h2>
              <p>{!! Illuminate\Support\Str::limit(strip_tags($c->content),200,'...') !!}
                <a href="{!! route('users.posts.read',['post_slug' => $c->slug]) !!}" class="btn btn-black">Read More</a>
              </p>
            </div>
          </div>
          @endforeach
          @endif
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Latest news</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
              <li>
                @foreach($allPostsSide as $arc)
                <div class="media"> 
                  <a href="{!! route('users.posts.read', ['post_slug' => $arc->slug]) !!}" class="media-left"> 
                    <img alt="{!! $arc->title !!}" src="/storage/public/storage/{!! $arc->image !!}"/> 
                  </a>
                  <div class="media-body"> 
                    <a href="{!! route('users.posts.read', ['post_slug' => $arc->slug]) !!}" class="catg_title">
                      {!! $arc->title !!}
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
            <h2><span>Politics</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                @if(!empty($politics))
                  @foreach($politics as $tic)
                <li>
                  <figure class="bsbig_fig"> 
                    <a href="{!! route('users.posts.read', ['post_slug' => $tic->slug]) !!}" class="featured_img"> 
                      <img alt="{!! $tic->title !!}" src="/storage/public/storage/{!! $tic->image !!}"/> 
                      <span class="overlay"></span> 
                    </a>
                    <figcaption> 
                      <a href="{!! route('users.posts.read', ['post_slug' => $tic->slug]) !!}">{!! $tic->title !!}</a> 
                    </figcaption>
                    <p>
                      {!! Illuminate\Support\Str::limit(strip_tags($tic->content),200,'...') !!}
                      <a href="{!! route('users.posts.read', ['post_slug' => $tic->slug]) !!}">Read More</a>
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
                  @foreach($politicSides as $pu)
                <li>
                  <div class="media wow fadeInDown"> 
                    <a href="{!! route('users.posts.read', ['post_slug' => $pu->slug]) !!}" class="media-left"> 
                      <img alt="{!! $pu->title !!}" src="/storage/public/storage/{!! $pu->image !!}"/> 
                    </a>
                    <div class="media-body"> 
                      <a href="{!! route('users.posts.read', ['post_slug' => $pu->slug]) !!}" class="catg_title">
                        {!! $pu->title !!}
                      </a> 
                    </div>
                  </div>
                </li>
                @endforeach
                @endif
              </ul>
            </div>
          </div>
          <div class="fashion_technology_area">
            <div class="fashion">
              <div class="single_post_content">
                <h2><span>Sports</span></h2>
                <ul class="business_catgnav wow fadeInDown">
                  @if(!empty($sports))
                  @forelse($sports as $sp)
                  <li>
                    <figure class="bsbig_fig"> 
                      <a href="{!! route('users.posts.read', ['post_slug' => $sp->slug]) !!}" class="featured_img"> 
                        <img alt="{!! $sp->title !!}" src="/storage/public/storage/{!! $sp->image !!}"/> 
                        <span class="overlay"></span> 
                      </a>
                      <figcaption> 
                        <a href="{!! route('users.posts.read', ['post_slug' => $sp->slug]) !!}">{!! $sp->title !!}</a> 
                      </figcaption>
                      <p>
                        {!! Illuminate\Support\Str::limit(strip_tags($sp->content),200,'...') !!}
                        <a href="{!! route('users.posts.read', ['post_slug' => $sp->slug]) !!}">Read More</a>
                      </p>
                    </figure>
                  </li>
                  @empty
                  <p style="margin-left: 20px;font-size: 20px;">
                    Sorry Esteemed viewer, <i style="color: red">Sports News</i> has not been published.
                  </p>
                  @endforelse
                @endif
                </ul>
                <ul class="spost_nav">
                  @if(!empty($sportSides))
                  @foreach($sportSides as $sid)
                  <li>
                    <div class="media wow fadeInDown"> 
                      <a href="{!! route('users.posts.read', ['post_slug' => $sid->slug]) !!}" class="media-left"> 
                        <img alt="{!! $sid->title !!}" src="/storage/public/storage/{!! $sid->image !!}"/> 
                      </a>
                      <div class="media-body"> 
                        <a href="{!! route('users.posts.read', ['post_slug' => $sid->slug]) !!}" class="catg_title">
                          {!! $sid->title !!}
                        </a> 
                      </div>
                    </div>
                  </li>
                  @endforeach
                @endif
                </ul>
              </div>
            </div>
            <div class="technology">
              <div class="single_post_content">
                <h2><span>Technology</span></h2>
                <ul class="business_catgnav">
                  <li>
                    <figure class="bsbig_fig wow fadeInDown"> <a href="pages/single_page.html" class="featured_img"> <img alt="" src="images/featured_img3.jpg"> <span class="overlay"></span> </a>
                      <figcaption> <a href="pages/single_page.html">Proin rhoncus consequat nisl eu ornare mauris</a> </figcaption>
                      <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a phare...</p>
                    </figure>
                  </li>
                </ul>
                <ul class="spost_nav">
                  <li>
                    <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                      <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                      <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                      <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                      <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="single_post_content">
            <h2><span>Santona Magazine</span></h2>
            <ul class="photograph_nav  wow fadeInDown">
              @if(!empty($magazines))
              @forelse($magazines as $mag)
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> 
                    <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img2.jpg" title="Photography Ttile 1"> 
                      <img src="images/photograph_img2.jpg" alt=""/>
                    </a> 
                  </figure>
                </div>
              </li>
              @empty
              <p style="margin-left: 20px;font-size: 20px;">
              	Sorry Esteemed viewer, <i style="color: red">Santona Magazine</i> has not been published.
              </p>
              @endforelse
              @endif
            </ul>
          </div>
          <div class="single_post_content">
            <h2><span>Games</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav">
                <li>
                  <figure class="bsbig_fig  wow fadeInDown"> <a class="featured_img" href="pages/single_page.html"> <img src="images/featured_img1.jpg" alt=""> <span class="overlay"></span> </a>
                    <figcaption> <a href="pages/single_page.html">Proin rhoncus consequat nisl eu ornare mauris</a> </figcaption>
                    <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a phare...</p>
                  </figure>
                </li>
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
                <li>
                  <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                    <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                  </div>
                </li>
                <li>
                  <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                    <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                  </div>
                </li>
                <li>
                  <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                    <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                  </div>
                </li>
                <li>
                  <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                    <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                  </div>
                </li>
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
