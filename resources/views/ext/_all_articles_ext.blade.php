  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
            <h2><span>{!! $poliCart->name !!}</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                @if(!empty($poliArticles))
                  @foreach($poliArticles as $tic)
                <li>
                  <figure class="bsbig_fig"> 
                    <a href="{!! $tic->path() !!}" class="featured_img"> 
                      <img src="{!! $tic->imageUrl() !!}" loading="lazy" alt="{!! $tic->title !!}"/> 
                      <span class="overlay"></span> 
                    </a>
                    <figcaption> 
                      <a href="{!! $tic->path() !!}">{!! $tic->title !!}</a> 
                    </figcaption>
                    <p>
                      {!! $tic->excerpt() !!}
                      <a href="{!! $tic->path() !!}" class="btn btn-link">Read More</a>
                    </p>
                  </figure>
                </li>
                  @endforeach
                @endif
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
                @if(!empty($poliSides))
                  @foreach($poliSides as $pu)
                <li>
                  <div class="media wow fadeInDown"> 
                    <a href="{!! $pu->path() !!}" class="media-left"> 
                      <img src="{!! $pu->imageUrl() !!}" loading="lazy" alt="{!! $pu->title !!}"/> 
                    </a>
                    <div class="media-body"> 
                      <a href="{!! $pu->path() !!}" class="catg_title">
                        {!! $pu->title !!}
                      </a>
                      <p><i>{!! $pu->created_date !!}</i></p> 
                    </div>
                  </div>
                </li>
                @endforeach
                @endif
              </ul>
            </div>
          </div>
          <div class="single_post_content">
            <h2><span>{!! $sportCart->name !!}</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                @if(!empty($sportArticles))
                @forelse($sportArticles as $sp)
                <li>
                  <figure class="bsbig_fig"> 
                    <a href="{!! $sp->path() !!}" class="featured_img"> 
                      <img src="{!! $sp->imageUrl() !!}" loading="lazy" alt="{!! $sp->title !!}"/> 
                      <span class="overlay"></span> 
                    </a>
                    <figcaption> 
                      <a href="{!! $sp->path() !!}">{!! $sp->title !!}</a> 
                    </figcaption>
                    <p>
                      {!! $sp->excerpt() !!}
                      <a href="{!! $sp->path() !!}" class="btn btn-link">Read More</a>
                    </p>
                  </figure>
                </li>
                @empty
                  <p style="margin-left: 20px;font-size: 20px;">
                    Sorry Esteemed viewer, <i style="color: red;margin: 0.5em">{!! $sportCart->name !!} News</i> Notyet published.
                  </p>
                @endforelse
                @endif
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
                @if(!empty($sportSides))
                  @foreach($sportSides as $sid)
                <li>
                  <div class="media wow fadeInDown"> 
                    <a href="{!! $sid->path() !!}" class="media-left"> 
                      <img src="{!! $sid->imageUrl() !!}" loading="lazy" alt="{!! $sid->title !!}"/> 
                    </a>
                    <div class="media-body"> 
                      <a href="{!! $sid->path() !!}" class="catg_title">
                        {!! $sid->title !!}
                      </a>
                      <p><i>{!! $sid->created_date !!}</i></p> 
                    </div>
                  </div>
                </li>
                @endforeach
                @endif
              </ul>
            </div>
          </div>
          <div class="single_post_content">
            <h2><span>{!! $techCart->name !!}</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                @if(!empty($techArticles))
                @forelse($techArticles as $tech)
                <li>
                  <figure class="bsbig_fig"> 
                    <a href="{!! $tech->path() !!}" class="featured_img"> 
                      <img src="{!! $tech->imageUrl() !!}" loading="lazy" alt="{!! $tech->title !!}"/> 
                      <span class="overlay"></span> 
                    </a>
                    <figcaption> 
                      <a href="{!! $tech->path() !!}">{!! $tech->title !!}</a> 
                    </figcaption>
                    <p>
                      {!! $tech->excerpt() !!}
                      <a href="{!! $tech->path() !!}" class="btn btn-link">Read More</a>
                    </p>
                  </figure>
                </li>
                @empty
                  <p style="margin-left: 20px;font-size: 20px;">
                    Sorry Esteemed viewer, <i style="color: red;margin: 0.5em">{!! $techCart->name !!} News</i> Notyet published.
                  </p>
                @endforelse
                @endif
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
                @if(!empty($techSides))
                  @foreach($techSides as $tecno)
                <li>
                  <div class="media wow fadeInDown"> 
                    <a href="{!! $tecno->path() !!}" class="media-left"> 
                      <img src="{!! $tecno->imageUrl() !!}" loading="lazy" alt="{!! $tecno->title !!}"/> 
                    </a>
                    <div class="media-body"> 
                      <a href="{!! $tecno->path() !!}" class="catg_title">
                        {!! $tecno->title !!}
                      </a>
                      <p><i>{!! $tecno->created_date !!}</i></p> 
                    </div>
                  </div>
                </li>
                @endforeach
                @endif
              </ul>
            </div>
          </div>
          <div class="single_post_content">
            <h2><span>{!! $magCart->name !!}</span></h2>
            <ul class="photograph_nav  wow fadeInDown">
              @if(!empty($magArticles))
              @forelse($magArticles as $mag)
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> 
                    <a class="fancybox-buttons" data-fancybox-group="button" href="{!! $mag->path() !!}" title="{!! $mag->title !!}"> 
                      <img src="{!! $mag->imageUrl() !!}" loading="lazy" alt="{!! $mag->title !!}"/>
                    </a> 
                  </figure>
                </div>
              </li>
              @empty
              <p style="margin-left: 20px;font-size: 20px;">
              	Sorry Esteemed viewer, <i style="color: red;margin: 0.5em">{!! $magCart->name !!}</i> Notyet published.
              </p>
              @endforelse
              @endif
            </ul>
          </div>
          <div class="single_post_content">
            <h2><span>Games</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav">
                <li>
                  <figure class="bsbig_fig  wow fadeInDown"> <a class="featured_img" href="pages/single_page.html"> <img src="images/featured_img1.jpg" alt=""> <span class="overlay"></span> </a>
                    <figcaption> <a href="pages/single_page.html">Proin rhoncus consequat nisl eu ornare mauris</a> </figcaption>
                    <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a phare...</p>
                  </figure>
                </li>
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
                <li>
                  <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                    <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                  </div>
                </li>
                <li>
                  <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                    <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                  </div>
                </li>
                <li>
                  <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                    <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                  </div>
                </li>
                <li>
                  <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                    <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                  </div>
                </li>
              </ul>
            </div>

            <div class="single_post_content">
            <h2><span>Videos</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav">
                @if(!empty($videos))
                @forelse($videos as $vx)
                <li>
                  <figure class="bsbig_fig  wow fadeInDown">  
                      <video width="256" height="144" controls> 
                        <source type="video/mp4" src="{!! $vx->videoUrl() !!}" alt="{!! $vx->title !!}">
                        <source type="video/ogg" src="{!! $vx->videoUrl() !!}" alt="{!! $vx->title !!}"> 
                        <source type="video/webm" src="{!! $vx->videoUrl() !!}" alt="{!! $vx->title !!}">
                        <embed src="{!! $vx->videoUrl() !!}" type="application/x-shockwave-flash" width="256" height="144" allowscriptaccess="always" allowfullscreen="true">
                        This browser doesn't support video tag.
                      </video>
                      <figcaption>
                        <a href="{!! $vx->path() !!}">
                          {!! $vx->title !!}
                        </a>
                      </figcaption>
                    <p>
                      {!! $vx->excerpt() !!}
                      <a href="{!! $vx->path() !!}" class="btn btn-link">Read More</a>
                    </p>
                  </figure>
                </li>
                @empty
                <p style="margin-left: 20px;font-size: 20px;">
                  Sorry Esteemed viewer, <i style="color: red;margin: 0.5em">Videos</i> Notyet published.
                </p>

                @endforelse
                @endif
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
                @forelse($videoSides as $sac)
                <li>
                  <div class="media wow fadeInDown"> 
                    <video width="150" height="84.5" controls> 
                      <source type="video/mp4" src = "{!! $sac->videoUrl() !!}" alt="{!! $sac->title !!}">
                      <source type="video/ogg" src="{!! $sac->videoUrl() !!}" alt="{!! $sac->title !!}"> 
                      <source type="video/webm" src="{!! $sac->videoUrl() !!}" alt="{!! $sac->title !!}">
                      <embed src="{!! $sac->videoUrl() !!}" type="application/x-shockwave-flash" width="150" height="84.5" allowscriptaccess="always" allowfullscreen="true">
                      This browser doesn't support video tag.
                    </video>
                    <div class="media-body"> 
                      <a href="{!! $sac->path() !!}" class="catg_title"> 
                        {!! $sac->title !!}
                      </a> 
                      <p><i>{!! $sac->created_date !!}</i></p>
                    </div>
                  </div>
                </li>
                @empty
                <p style="font-size: 10px;">
                  Sorry Esteemed viewer, <i style="color: red;margin: 0.5em">Videos</i> Notyet published.
                </p>
                @endforelse
              </ul>
            </div>
          </div>
          </div>
          @include('user.posts.tags')
          @include('user.newsletter.newsletter')
          <br/><br/>
        </div>
      </div>
      @include('partials.aside_postextension')
    </div>
  </section>