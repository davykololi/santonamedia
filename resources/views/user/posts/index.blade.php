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
            <a href="{!! route('users.posts.read',['post_slug' => $tu->slug]) !!}"> 
              <img src="/storage/public/storage/{!! $tu->image !!}" alt="{!! $tu->title !!}"/>
            </a>
            <div class="slider_article">
              <h2>
                <a class="slider_tittle" href="{!! route('users.posts.read',['post_slug' => $tu->slug]) !!}">
                  {!! $tu->title !!}
                </a>
              </h2>
              <p>
                {!! Illuminate\Support\Str::limit(strip_tags($tu->content),200,'...') !!}
                <a href="{!! route('users.posts.read',['post_slug' => $tu->slug]) !!}">
                  <i style="color: lightblue;">Read More</i>
                </a>
              </p>
            </div>
          </div>
          @empty
          <p style="color: green;font-size: 20px">Sorry esteemed viewer, We are yet to post 
            <span style="color: red;margin: 5px"> {!! $category->name !!} Articles</span>
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
                  <a href="{!! route('users.posts.read', ['post_slug' => $nr->slug]) !!}" class="media-left"> 
                    <img alt="{!! $nr->title !!}" src="/storage/public/storage/{!! $nr->image !!}"/> 
                  </a>
                  <div class="media-body"> 
                    <a href="{!! route('users.posts.read', ['post_slug' => $nr->slug]) !!}" class="catg_title">
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
                    <a href="{!! route('users.posts.read', ['post_slug' => $p->slug]) !!}" class="featured_img"> 
                      <img alt="{!! $p->title !!}" src="/storage/public/storage/{!! $p->image !!}"/> 
                      <span class="overlay"></span> 
                    </a>
                    <figcaption> 
                      <a href="{!! route('users.posts.read', ['post_slug' => $p->slug]) !!}">{!! $p->title !!}</a> </figcaption>
                    <p>
                      {!! Illuminate\Support\Str::limit(strip_tags($p->content),200,'...') !!}
                      <a href="{!! route('users.posts.read', ['post_slug' => $p->slug]) !!}">
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
                    <a href="{!! route('users.posts.read', ['post_slug' => $arch->slug]) !!}" class="media-left"> 
                      <img alt="{!! $arch->title !!}" src="/storage/public/storage/{!! $arch->image !!}"/> 
                    </a>
                    <div class="media-body"> 
                      <a href="{!! route('users.posts.read', ['post_slug' => $arch->slug]) !!}" class="catg_title">
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
            <h2><span>Political News</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                @if(!empty($politicArticles))
                  @foreach($politicArticles as $art)
                <li>
                  <figure class="bsbig_fig"> 
                    <a href="{!! route('users.posts.read', ['post_slug' => $art->slug]) !!}" class="featured_img"> 
                      <img alt="{!! $art->title !!}" src="/storage/public/storage/{!! $art->image !!}"/> 
                      <span class="overlay"></span> 
                    </a>
                    <figcaption> 
                      <a href="{!! route('users.posts.read', ['post_slug' => $art->slug]) !!}">{!! $art->title !!}</a>
                    </figcaption>
                    <p>
                      {!! Illuminate\Support\Str::limit(strip_tags($art->content),200,'...') !!}
                      <a href="{!! route('users.posts.read', ['post_slug' => $art->slug]) !!}">
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
                    <a href="{!! route('users.posts.read', ['post_slug' => $sd->slug]) !!}" class="media-left"> 
                      <img alt="{!! $sd->title !!}" src="/storage/public/storage/{!! $sd->image !!}"/> 
                    </a>
                    <div class="media-body"> 
                      <a href="{!! route('users.posts.read', ['post_slug' => $sd->slug]) !!}" class="catg_title">
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
            <h2><span>Sports News</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav">
                @if(!empty($sportNews))
                  @foreach($sportNews as $spt)
                <li>
                  <figure class="bsbig_fig  wow fadeInDown"> 
                    <a class="featured_img" href="{!! route('users.posts.read', ['post_slug' => $spt->slug]) !!}"/> 
                      <img src="/storage/public/storage/{!! $spt->image !!}" alt="{!! $spt->title !!}"> 
                      <span class="overlay"></span> 
                    </a>
                    <figcaption> 
                      <a href="{!! route('users.posts.read', ['post_slug' => $spt->slug]) !!}">{!! $spt->title !!}</a> 
                    </figcaption>
                    <p>
                      {!! Illuminate\Support\Str::limit(strip_tags($spt->content),200,'...') !!}
                      <a href="{!! route('users.posts.read',['post_slug' => $spt->slug]) !!}">
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
          </div> <!-- end of single post content -->
          
          <div class="single_post_content">
            <h2><span>Games</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav">
                <li>
                  <figure class="bsbig_fig  wow fadeInDown"> 
                    <a class="featured_img" href="pages/single_page.html"> 
                      <img src="images/featured_img1.jpg" alt=""> <span class="overlay"></span> </a>
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
        </div>
      </div>
      @include('partials.aside_postextension')
    </div>
  </section>
@endsection


