@extends('layouts.app')
@section('title'|'Videos')

@section('content')
@include('partials.videosection')
  <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick">
          @if(!empty($videos))
          @forelse($videos as $vid)
          <div class="single_iteam"> 
            <figure>
        		<video width="512" height="288" controls> 
            		<source type="video/mp4" src="/storage/public/videos/{!! $vid->video !!}" alt="{!! $vid->title !!}">
            		<source type="video/ogg" src="/storage/public/videos/{!! $vid->video !!}" alt="{!! $vid->title !!}">     
            		<source type="video/webm" src="/storage/public/videos/{!! $vid->video !!}" alt="{!! $vid->title !!}"> 
                	This browser doesn't support video tag.
        		</video>
    			<figcaption class="figcaption"> {!! $vid->caption !!} </figcaption>
    		</figure>
    		<div>
    		<br/>
              <p>
                {!! Illuminate\Support\Str::limit(strip_tags($vid->content),200,'...') !!}
                <a href="{!! route('users.videos.read',['video_slug' => $vid->slug]) !!}">
                  <i style="color: black">Read More</i>
                </a>
              </p>
            </div>
          </div>
          @empty
            <p style="color: blue;font-size: 20px">Sorry esteemed viewer, We are yet to post 
            <span style="color: red;margin: 5px"> {!! $category->name !!} Videos</span>
          </p>
          @endforelse
          @endif
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Latest {!! $category->name !!} Videos</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
              <li>
                @foreach($archives as $ars)
                <div class="media"> 
        			<video width="150" height="84.5" controls poster="{!! asset('/static/lion.JPG') !!}"> 
            			<source type="video/mp4" src = "/storage/public/videos/{!! $ars->video !!}" alt="{!! $ars->title !!}">
            			<source type="video/ogg" src="/storage/public/videos/{!! $ars->video !!}" alt="{!! $ars->title !!}"> 
            			<source type="video/webm" src="/storage/public/videos/{!! $ars->video !!}" alt="{!! $ars->title !!}"> 
                		This browser doesn't support video tag.
        			</video>
        			<br/>
                  <div class="media-body"> 
                  	<a href="{!! route('users.videos.read', ['video_slug' => $ars->slug]) !!}" class="catg_title">
                  		{!! $ars->title !!}
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
            <h2><span>General Videos</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                @if(!empty($allVideos))
                  @foreach($allVideos as $vis)
                <li>
                <figure class="bsbig_fig"> 
        			     <video width="300" height="169" controls poster="{!! asset('/static/lion.JPG') !!}"> 
            			   <source type="video/mp4" src = "/storage/public/videos/{!! $vis->video !!}" alt="{!! $vis->title !!}">
            			   <source type="video/ogg" src="/storage/public/videos/{!! $vis->video !!}" alt="{!! $vis->title !!}">   
            			   <source type="video/webm" src="/storage/public/videos/{!! $vis->video !!}" alt="{!! $vis->title !!}"> 
                		  This browser doesn't support video tag.
        			     </video>
        			     <br/>
    				      <figcaption class="figcaption"> {!! $vis->caption !!} </figcaption>
                    <p>
                    	{!! Illuminate\Support\Str::limit(strip_tags($vis->content),200,'...') !!}
                    	<a href="{!! route('users.videos.read',['video_slug' => $vis->slug]) !!}">
                        <i style="color: black">Read More</i>
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
                @if(!empty($allVidSides))
                  @foreach($allVidSides as $cv)
                <li>
                  <div class="media wow fadeInDown"> 
                    <figure>
        			       <video width="150" height="84.5" controls poster="{!! asset('/static/lion.JPG') !!}"> 
            			     <source type="video/mp4" src = "/storage/public/videos/{!! $cv->video !!}" alt="{!! $cv->title !!}">
            			     <source type="video/ogg" src="/storage/public/videos/{!! $cv->video !!}" alt="{!! $cv->title !!}">   
                       <source type="video/webm" src="/storage/public/videos/{!! $cv->video !!}" alt="{!! $cv->title !!}"> 
                		    This browser doesn't support video tag.
        			       </video>
        			       <br/>
  					       </figure>
                    <div class="media-body"> <a href="{!! route('users.videos.read', ['video_slug' => $cv->slug]) !!}" class="catg_title">{!! $cv->title !!}</a> </div>
                  </div>
                </li>
                @endforeach
                @endif
              </ul>
            </div>
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
        </div>
      </div>
      @include('partials.aside_videoextension')
    </div>
  </section>
@endsection


