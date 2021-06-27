  <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        @include('partials.errors')
        <div class="slick_slider">
          @if(!empty($allPosts))
               @forelse($allPosts as $c)
          <div class="single_iteam"> 
            <a href="{!! $c->path() !!}"> 
              <img src="{!! $c->imageUrl() !!}" alt="{!! $c->title !!}"/>
            </a>
            <div class="slider_article">
              <h2>
                <a class="slider_tittle" href="{!! $c->path() !!}">
                  {!! $c->title !!}
                </a>
              </h2>
              <p>{!! $c->excerpt() !!}
                <a href="{!! $c->path() !!}" class="btn btn-link">Read More</a>
              </p>
            </div>
          </div>
          @empty
            <p>Sorry esteemed viewer, we are yet to publish articles!!</p>
          @endforelse
          @endif
        </div>
      </div>
      @include('partials.latest_posts')
    </div>
  </section>