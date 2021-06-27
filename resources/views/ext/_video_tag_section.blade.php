<section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
        	<div class="articles_page">
          	@if(!empty($tagVideos))
          	@forelse($tagVideos as $kc)
          	<h2 style="text-transform: uppercase;"><a href="{!! $kc->path() !!}">{{$kc->title}}</a></h2>
            <div class="post_commentbox" style="margin-bottom: 15px"> 
              <a href="{!! $kc->path() !!}">
                <i class="fa fa-user"></i>Wpfreeware
              </a> 
              <span><i class="fa fa-calendar"></i>Posted On: {!! $kc->created_at->toDayDateTimeString() !!}</span> 
              <a href="{!! $kc->category->path() !!}"><i class="fa fa-tags"></i>
                {!! $kc->category->name !!}
              </a> 
              <span>Article By:</span>
              <a href="{!! $kc->admin->videoPath() !!}">
                <span style="margin: 5px;color: #696969"> 
                  <b>{!! $kc->admin->name !!}</b>
                  <img class="author-img" src="/storage/public/storage/{!! $kc->admin->image !!}" alt="{!! $kc->admin->name !!}">
                </span>
              </a>  
            </div>
          <figure>
            <video width="512" height="288" controls> 
              <source type="video/mp4" src="{!! $kc->videoUrl() !!}" alt="{!! $kc->title !!}">
              <source type="video/ogg" src="{!! $kc->videoUrl() !!}" alt="{!! $kc->title !!}"> 
              <source type="video/webm" src="{!! $kc->videoUrl() !!}" alt="{!! $kc->title !!}"> 
              This browser doesn't support video tag.
            </video>
            <figcaption class="figcaption"> <b>{!! $kc->caption !!}</b> </figcaption>
          </figure>
          <br/>
          <div>
            <p>
              {!! $kc->excerpt() !!}
              <a href="{!! $kc->path() !!}">
                <i style="color: black;">Read More</i>
              </a>
            </p>
          </div>
          <hr/>
          @empty
          <p style="color: blue;font-size: 20px">Sorry esteemed viewer, We are yet to post 
            <span style="color: red;margin: 5px"> {!! $tag->name !!} Videos.</span>
            Scroll down for more articles and stay tuned. Thank you.
          </p>
          @endforelse
          @endif
      	</div>
        </div><!--end of left-content -->
      </div><!--end of col -->
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Latest {!! $tag->name !!} Videos</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
              <li>
                @foreach($tagVidSides as $py)
                <div class="media">
                  <figure>
                    <video width="150" height="84.5" controls> 
                      <source type="video/mp4" src="{!! $py->videoUrl() !!}" alt="{!! $py->title !!}">
                      <source type="video/ogg" src="{!! $py->videoUrl() !!}" alt="{!! $py->title !!}">     
                      <source type="video/webm" src="{!! $py->videoUrl() !!}" alt="{!! $py->title !!}"> 
                      This browser doesn't support video tag.
                    </video>
                  </figure>
                  <div class="media-body"> 
                    <a href="{!! $py->path() !!}" class="catg_title">
                      {!! $py->title !!}
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