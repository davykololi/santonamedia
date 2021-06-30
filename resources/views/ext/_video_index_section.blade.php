<section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="articles_page">
          @if(!empty($videos))
          @forelse($videos as $vid)
          <h2 style="text-transform: uppercase;"><a href="{!! $vid->path() !!}">{{$vid->title}}</a></h2>
            <div class="post_commentbox" style="margin-bottom: 15px"> 
              <a href="{!! $vid->path() !!}">
                <i class="fa fa-user"></i>Wpfreeware
              </a> 
              <span><i class="fa fa-calendar"></i>Posted On: {!! $vid->created_at->toDayDateTimeString() !!}</span> 
              <a href="{!! $vid->category->path() !!}"><i class="fa fa-tags"></i>
                {!! $vid->category->name !!}
              </a> 
              <span>Article By:</span>
              <a href="{!! $vid->admin->videoPath() !!}">
                <span style="margin: 5px;color: #696969"> 
                  <b>{!! $vid->admin->name !!}</b>
                  <img class="author-img" src="/storage/public/storage/{!! $vid->admin->image !!}" alt="{!! $vid->admin->name !!}">
                </span>
              </a>  
            </div>
          <figure class="contact_area">
        		<video width="512" height="288" controls> 
            	<source type="video/mp4" src="{!! $vid->videoUrl() !!}" alt="{!! $vid->title !!}">
            	<source type="video/ogg" src="{!! $vid->videoUrl() !!}" alt="{!! $vid->title !!}">     
            	<source type="video/webm" src="{!! $vid->videoUrl() !!}" alt="{!! $vid->title !!}">
              <embed src="{!! $vid->videoUrl() !!}" type="application/x-shockwave-flash" width="512" height="288" allowscriptaccess="always" allowfullscreen="true"> 
              This browser doesn't support video tag.
        		</video>
            <figcaption class="figcaption"> {!! $vid->caption !!} </figcaption>
    		  </figure>
    		  <br/>
          <div>
            <p>
              {!! $vid->excerpt() !!}
              <a href="{!! $vid->path() !!}">
                <i style="color: black">Read More</i>
              </a>
            </p>
          </div>
          <hr/>
          @empty
          <p style="color: blue;font-size: 20px">Sorry esteemed viewer, We are yet to publish 
            <span style="color: red;margin: 5px"> {!! $category->name !!} Videos. </span>
            Scroll down for more articles and stay tuned. Thank you.
          </p>
          @endforelse
          @endif
          </div>
        </div><!--end of left-content -->
      </div><!--end of col -->
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Latest {!! $category->name !!} Videos</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
              <li>
                @foreach($archives as $ars)
                <div class="media">
                  <video width="150" height="84.5" controls>
                    <source type="video/mp4" src="{!! $ars->videoUrl() !!}" alt="{!! $ars->title !!}">
                    <source type="video/ogg" src="{!! $ars->videoUrl() !!}" alt="{!! $ars->title !!}">
                    <source type="video/webm" src="{!! $ars->videoUrl() !!}" alt="{!! $ars->title !!}">
                    <embed src="{!! $ars->videoUrl() !!}" type="application/x-shockwave-flash" width="150" height="84.5" allowscriptaccess="always" allowfullscreen="true">
                		  This browser doesn't support video tag.
                  </video>
                  <br/>
                  <div class="media-body"> 
                  	<a href="{!! $ars->path() !!}" class="catg_title">
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
