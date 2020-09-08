<section id="newsSection">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="latest_newsarea"> <span>Latest News</span>
          <ul id="ticker01" class="news_sticker"> 
            @if(!empty($allPosts))
            @foreach($allPosts as $pas)
            <li><a href="{!! route('users.posts.read',['post_slug' => $pas->slug]) !!}"><img width="25" src="/storage/public/storage/{!! $pas->image !!}" alt="{!! $pas->title !!}">{!! $pas->title !!}</a></li>
            @endforeach
            @endif
          </ul>
          @include('partials.social_links')
        </div>
      </div>
    </div>
  </section>