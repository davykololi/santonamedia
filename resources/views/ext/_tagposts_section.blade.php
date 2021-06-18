  <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">
          @if(!empty($tagPosts))
               @forelse($tagPosts as $pic)
          <div class="single_iteam"> 
            <a href="{!! $pic->path() !!}"> 
              <img src="{!! $pic->imageUrl() !!}" alt="{!! $pic->title !!}"/>
            </a>
            <div class="slider_article">
              <h2>
                <a class="slider_tittle" href="{!! $pic->path() !!}">
                  {!! $pic->title !!}
                </a>
              </h2>
              <p>
                {!! $pic->excerpt() !!}
                <a href="{!! $pic->path() !!}">
                  <i style="color: lightblue;">Read More</i>
                </a>
              </p>
            </div>
          </div>
          @empty
            <p style="color: blue;font-size: 20px">Sorry esteemed viewer, We are yet to post 
              <span style="color: red;margin: 5px"> {!! $tag->name !!} Articles.</span>
              Scroll down for more articles and stay tuned. Thank you.
            </p>
          @endforelse
          @endif
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Latest {!! $tag->name !!} News</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
              <li>
                @foreach($tagPostsSide as $ar)
                <div class="media"> 
                  <a href="{!! $ar->path() !!}" class="media-left"> 
                    <img src="{!! $ar->imageUrl() !!}" loading="lazy" alt="{!! $ar->title !!}"/> 
                  </a>
                  <div class="media-body"> 
                    <a href="{!! $ar->path() !!}" class="catg_title">
                      {!! $ar->title !!}
                    </a> 
                    <p><i>{!! $ar->created_date !!}</i></p>
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