  <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="articles_page">
          @if(!empty($adminVideos))
               @forelse($adminVideos as $kc)
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
                <figcaption class="figcaption"> {!! $kc->title !!} </figcaption>
              </figure>
              <br/>
            <div>
              <p>
                {!! $kc->excerpt() !!}
                <a href="{!! route('users.videos.read',['slug' => $kc->slug]) !!}"><i style="color: black">Read More</i></a>
              </p>
            </div>
            <hr/>
          @empty
            <p style="color: blue;font-size: 20px">Sorry esteemed viewer, We are yet to post 
            <span style="color: red;margin: 5px"> {!! $admin->name !!} Videos.</span>
            Scroll down for more articles and stay tuned. Thank you.
          </p>
          @endforelse
          @endif
        </div>
        </div>
      </div>
      @include('partials.aside_adminvideos')
    </div>
  </section>
