  <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">
          @if(!empty($categoryPosts))
               @forelse($categoryPosts as $tu)
          <div class="single_iteam"> 
            <a href="{!! $tu->path() !!}"> 
              <img src="{!! $tu->imageUrl() !!}" alt="{!! $tu->title !!}"/>
            </a>
            <div class="slider_article">
              <h2>
                <a class="slider_tittle" href="{!! $tu->path() !!}">
                  {!! $tu->title !!}
                </a>
              </h2>
              <p>
                {!! $tu->excerpt() !!}
                <a href="{!! $tu->path() !!}">
                  <i style="color: lightblue;">Read More</i>
                </a>
              </p>
            </div>
          </div>
          @empty
          <img src="{!! asset('static/surprised.jpg') !!}" width="100" height="100" align="left" alt="No {!! $category->name !!} Videos">
          <p style="color: green;font-size: 20px">Sorry esteemed viewer, We are yet to publish 
            <span style="color: red;margin: 5px"> {!! $category->name !!} Articles. </span>
            Scroll down for more articles and stay tuned. Thank you.
          </p>
          @endforelse
          @endif
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Latest {!! $category->name !!} Articles</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
              <li>
                @foreach($catPostsSide as $nr)
                <div class="media"> 
                  <a href="{!! $nr->path() !!}" class="media-left"> 
                    <img src="{!! $nr->imageUrl() !!}" alt="{!! $nr->title !!}"/> 
                  </a>
                  <div class="media-body"> 
                    <a href="{!! $nr->path() !!}" class="catg_title">
                      {!! $nr->title !!}
                    </a> 
                    <p><i>{!! $nr->created_date !!}</i></p>
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
  