  <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">
          @if(!empty($adminPosts))
               @forelse($adminPosts as $pic)
          <div class="single_iteam"> 
            <a href="{!! route('users.posts.read',['slug' => $pic->slug]) !!}"> 
              <img src="{!! $pic->imageUrl() !!}" alt="{!! $pic->title !!}"/>
            </a>
            <div class="slider_article">
              <h2>
                <a class="slider_tittle" href="{!! route('users.posts.read',['slug' => $pic->slug]) !!}">
                  {!! $pic->title !!}
                </a>
              </h2>
              <p>
                {!! $pic->excerpt() !!}
                <a href="{!! route('users.posts.read',['slug' => $pic->slug]) !!}"/>
                  <i style="color: lightblue;">Read More</i>
                </a>
              </p>
            </div>
          </div>
          @empty
            <p style="color: blue;font-size: 20px">Sorry esteemed viewer, We are yet to post 
              <span style="color: red;margin: 5px"> {!! $admin->name !!} Articles.</span>
              Scroll down for more articles and stay tuned. Thank you.
            </p>
          @endforelse
          @endif
        </div>
      </div>
      @include('partials.aside_adminarticles')
    </div>
  </section>