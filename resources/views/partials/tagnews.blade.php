<section id="newsSection">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="latest_newsarea"> <span>{!! $tag->name !!} News</span>
          <ul id="ticker01" class="news_sticker"> 
            @if(!empty($tagPosts))
            @foreach($tagPosts as $pas)
            <li>
              <a href="{!! $pas->path() !!}">
                <img width="25" src="{!! $pas->imageUrl() !!}" alt="{!! $pas->title !!}">
                {!! $pas->title !!}
              </a>
            </li>
            @endforeach
            @endif
          </ul>
          @include('partials.social_links')
        </div>
      </div>
    </div>
  </section>