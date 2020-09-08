<section id="newsSection">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="latest_newsarea"> <span>Latest Videos</span>
          <ul id="ticker01" class="news_sticker"> 
            @if(!empty($videos))
              @foreach($videos as $vs)
              <li> 
                <video width="51.2" height="28.8" controls>
                  <source type="video/mp4" src = "/storage/public/videos/{!! $vs->video !!}" alt="{!! $vs->title !!}">
                </video>
              </li>
              @endforeach
            @endif
          </ul>
          @include('partials.social_links')
        </div>
      </div>
    </div>
  </section>