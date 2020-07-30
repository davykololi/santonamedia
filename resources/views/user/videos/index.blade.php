@extends('layouts.app')
@section('title'|'Videos')

@section('content')
  <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick">
          @if(!empty($videos))
               @foreach($videos as $video)
          <div class="single_iteam"> 
            <figure>
        		<video width="512" height="288" controls poster="{{asset('/static/lion.JPG')}}"> 
            		<source type="video/mp4" src = "/storage/public/videos/{{ $video->video }}" alt="{{$video->title}}">
            		<source type="video/ogg" src="/storage/public/videos/{{ $video->video }}" alt="{{$video->title}}">     
            		<source type="video/webm" src="/storage/public/videos/{{ $video->video }}" alt="{{$video->title}}"> 
                	This browser doesn't support video tag.
        		</video>
    			<figcaption class="figcaption"> {{$video->caption}} </figcaption>
    		</figure>
    		<div>
    		<br/>
              <p>
                {{ Str::limit($video->content,$limit=30,$end= '...') }}
                <a href="{{ route('users.videos.read',['video_slug' => $video->slug]) }}" class="btn btn-blue">Read More</a>
              </p>
            </div>
          </div>
          @endforeach
          @endif
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Latest {{$category->name}} Videos</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
              <li>
                @foreach($archives as $archive)
                <div class="media"> 
                  <figure>
        			<video width="150" height="84.5" controls poster="{{asset('/static/lion.JPG')}}"> 
            			<source type="video/mp4" src = "/storage/public/videos/{{ $video->video }}" alt="{{$video->title}}">
            			<source type="video/ogg" src="/storage/public/videos/{{ $video->video }}" alt="{{$video->title}}"> 
            			<source type="video/webm" src="/storage/public/videos/{{ $video->video }}" alt="{{$video->title}}"> 
                		This browser doesn't support video tag.
        			</video>
        			<br/>
                  <div class="media-body"> 
                  	<a href="{{ route('users.videos.read', ['video_slug' => $archive->slug]) }}" class="catg_title">
                  		{!! $archive->title !!}
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
            <h2><span>{{$category->name}}</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                @if(!empty($category->videos))
                  @foreach($category->videos as $video)
                <li>
                <figure class="bsbig_fig"> 
        			<video width="300" height="169" controls poster="{{asset('/static/lion.JPG')}}"> 
            			<source type="video/mp4" src = "/storage/public/videos/{{ $video->video }}" alt="{{$video->title}}">
            			<source type="video/ogg" src="/storage/public/videos/{{ $video->video }}" alt="{{$video->title}}">   
            			<source type="video/webm" src="/storage/public/videos/{{ $video->video }}" alt="{{$video->title}}"> 
                		This browser doesn't support video tag.
        			</video>
        			<br/>
    				<figcaption class="figcaption"> {{$video->caption}} </figcaption>
                    <p>
                    	{{ Str::limit($video->content,$limit=30,$end= '...') }}
                    	<a href="{{ route('users.videos.read',['video_slug' => $video->slug]) }}" class="btn btn-blue">Read More</a>
                    </p>
                </figure>
                </li>
                  @endforeach
                @endif
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
                @if(!empty($archives))
                  @foreach($archives as $archive)
                <li>
                  <div class="media wow fadeInDown"> 
                    <figure>
        			<video width="150" height="84.5" controls poster="{{asset('/static/lion.JPG')}}"> 
            			<source type="video/mp4" src = "/storage/public/videos/{{ $video->video }}" alt="{{$video->title}}">
            			<source type="video/ogg" src="/storage/public/videos/{{ $video->video }}" alt="{{$video->title}}">   <source type="video/webm" src="/storage/public/videos/{{ $video->video }}" alt="{{$video->title}}"> 
                		This browser doesn't support video tag.
        			</video>
        			<br/>
  					</figure>
                    <div class="media-body"> <a href="{{ route('users.videos.read', ['video_slug' => $archive->slug]) }}" class="catg_title">{{$archive->title}}</a> </div>
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
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Popular Post</span></h2>
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
          <div class="single_sidebar">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">Category</a></li>
              <li role="presentation"><a href="#video" aria-controls="profile" role="tab" data-toggle="tab">Video</a></li>
              <li role="presentation"><a href="#comments" aria-controls="messages" role="tab" data-toggle="tab">Comments</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="category">
                <ul>
                  @if(!empty($categories))
                    @foreach($categories as $category)
                  <li class="cat-item">
                    <a href="{{route('category.videos',['slug' => $category->slug])}}">
                      {{ $category->name }}
                    </a>
                  </li>
                    @endforeach
                  @endif
                </ul>
              </div>
              <div role="tabpanel" class="tab-pane" id="video">
                <div class="vide_area">
                  <iframe width="100%" height="250" src="http://www.youtube.com/embed/h5QWbURNEpA?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="comments">
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
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Sponsor</span></h2>
            <a class="sideAdd" href="#"><img src="images/add_img.jpg" alt=""></a> </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Category Archive</span></h2>
            <select class="catgArchive">
              <option>Select Category</option>
              <option>Life styles</option>
              <option>Sports</option>
              <option>Technology</option>
              <option>Treads</option>
            </select>
          </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Links</span></h2>
            <ul>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Rss Feed</a></li>
              <li><a href="#">Login</a></li>
              <li><a href="#">Life &amp; Style</a></li>
            </ul>
          </div>
        </aside>
      </div>
    </div>
  </section>
@endsection


