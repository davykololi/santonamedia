<section id="newsSection">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="latest_newsarea"> <span>Latest Videos</span>
          <ul id="ticker01" class="news_sticker"> 
            @if(!empty($videos))
              @foreach($videos as $vs)
              <li> 
                <a href="{!! $vs->path() !!}">{!! $vs->title !!}</a>
              </li>
              @endforeach
            @endif
          </ul>
          @include('partials.social_links')
        </div>
      </div>
    </div>
  </section>