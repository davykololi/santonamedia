  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
            <h2><span> {!! $entCart->name !!} Videos</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                @if(!empty($entArticles))
                  @forelse($entArticles as $ent)
                <li>
                  <figure class="bsbig_fig">
                    <figure>
                      <video width="300" height="169" controls> 
                        <source type="video/mp4" src="{!! $ent->videoUrl() !!}" alt="{ !!$ent->title !!}">
                        <source type="video/ogg" src="{!! $ent->videoUrl() !!}" alt="{!! $ent->title !!}">   
                        <source type="video/webm" src="{!!$ent->videoUrl() !!}" alt="{!!$ent->title!!}">
                        <embed src="{!! $ent->videoUrl() !!}" type="application/x-shockwave-flash" width="300" height="169" allowscriptaccess="always" allowfullscreen="true"> 
                        This browser doesn't support video tag.
                      </video>
                    <figcaption> 
                      <a href="{!! route('users.videos.read', ['slug' => $ent->slug]) !!}">{!! $ent->title !!}</a>
                    </figcaption>
                    <p>{!! $ent->excerpt() !!}<a href="{!! $ent->path() !!}" class="btn btn-link">Read More</a></p>
                  </figure>
                </li>
                  @empty
                    <img src="{!! asset('static/surprised.jpg') !!}" width="100" height="100" alt="No {!! $entCart->name !!} Videos">
                    <p style="color: black;font-size: 20px">
                      Sorry Esteemed viewer. We are yet to publish <span style="color: red;margin: 1em;"> {!! $entCart->name !!} Videos. </span> Keep in touch. Thank you.
                    </p>
                  @endforelse
                @endif
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
                @if(!empty($entSides))
                  @foreach($entSides as $entSide)
                <li>
                  <div class="media wow fadeInDown"> 
                    <figure>
                      <video width="150" height="84.5" controls> 
                      <source type="video/mp4" src="{!! $entSide->videoUrl() !!}" alt="{!! $entSide->title !!}">
                      <source type="video/ogg" src="{!! $entSide->videoUrl() !!}" alt="{!! $entSide->title !!}">  
                      <source type="video/webm" src="{!! $entSide->videoUrl() !!}" alt="{!! $entSide->title !!}"> 
                      <embed src="{!! $entSide->videoUrl() !!}" type="application/x-shockwave-flash" width="150" height="84.5" allowscriptaccess="always" allowfullscreen="true">
                      This browser doesn't support video tag.
                      </video>
                    </figure>
                    <div class="media-body"> 
                      <a href="{!! route('users.videos.read', ['slug' => $entSide->slug]) !!}" class="catg_title">
                        {!! $entSide->title !!}
                      </a> 
                    </div>
                  </div>
                </li>
                @endforeach
                @endif
              </ul>
            </div>
          </div>

          <div class="single_post_content">
            <h2><span> {!! $sportCart->name !!} Videos</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                @if(!empty($sportArticles))
                  @forelse($sportArticles as $sportArticle)
                <li>
                  <figure class="bsbig_fig">
                    <figure>
                      <video width="300" height="169" controls> 
                        <source type="video/mp4" src="{!! $sportArticle->videoUrl() !!}" alt="{ !! $sportArticle->title !!}">
                        <source type="video/ogg" src="{!! $sportArticle->videoUrl() !!}" alt="{!! $sportArticle->title !!}">   
                        <source type="video/webm" src="{!! $sportArticle->videoUrl() !!}" alt="{!! $sportArticle->title!!}">
                        <embed src="{!! $sportArticle->videoUrl() !!}" type="application/x-shockwave-flash" width="300" height="169" allowscriptaccess="always" allowfullscreen="true"> 
                        This browser doesn't support video tag.
                      </video>
                    <figcaption> 
                      <a href="{!! route('users.videos.read', ['slug' => $sportArticle->slug]) !!}">
                        {!! $sportArticle->title !!}
                      </a>
                    </figcaption>
                    <p>{!! $sportArticle->excerpt() !!}<a href="{!! $sportArticle->path() !!}" class="btn btn-link">Read More</a></p>
                  </figure>
                </li>
                  @empty
                      <img src="{!! asset('static/surprised.jpg') !!}" width="100" height="100" align="left" alt="No {!! $sportCart->name !!} Videos">
                      <span style="color: black;font-size: 20px">
                        Sorry Esteemed viewer. We are yet to publish <span style="color: red;margin: 1em;"> {!! $sportCart->name !!} Videos. </span>Keep in touch. Thank you.
                      </span>
                  @endforelse
                @endif
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
                @if(!empty($sportSides))
                  @foreach($sportSides as $sportSide)
                <li>
                  <div class="media wow fadeInDown"> 
                    <figure>
                      <video width="150" height="84.5" controls> 
                      <source type="video/mp4" src="{!! $sportSide->videoUrl() !!}" alt="{!! $sportSide->title !!}">
                      <source type="video/ogg" src="{!! $sportSide->videoUrl() !!}" alt="{!! $entSide->title !!}">  
                      <source type="video/webm" src="{!! $sportSide->videoUrl() !!}" alt="{!! $sportSide->title !!}">
                      <embed src="{!! $sportSide->videoUrl() !!}" type="application/x-shockwave-flash" width="150" height="84.5" allowscriptaccess="always" allowfullscreen="true"> 
                      This browser doesn't support video tag.
                      </video>
                    </figure>
                    <div class="media-body"> 
                      <a href="{!! route('users.videos.read',['slug' => $sportSide->slug]) !!}" class="catg_title">
                        {!! $sportSide->title !!}
                      </a> 
                    </div>
                  </div>
                </li>
                @endforeach
                @endif
              </ul>
            </div>
          </div>

          <div class="single_post_content">
            <h2><span>{!! $poliCart->name !!} Videos</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                @if(!empty($poliArticles))
                  @forelse($poliArticles as $poli)
                <li>
                  <figure class="bsbig_fig">
                    <figure>
                      <video width="300" height="169" controls> 
                        <source type="video/mp4" src="{!! $poli->videoUrl() !!}" alt="{ !! $poli->title !!}">
                        <source type="video/ogg" src="{!! $poli->videoUrl() !!}" alt="{!! $poli->title !!}">   
                        <source type="video/webm" src="{!! $poli->videoUrl() !!}" alt="{!! $poli->title!!}">
                        <embed src="{!! $poli->videoUrl() !!}" type="application/x-shockwave-flash" width="300" height="169" allowscriptaccess="always" allowfullscreen="true"> 
                        This browser doesn't support video tag.
                      </video>
                    <figcaption> 
                      <a href="{!! route('users.videos.read', ['slug' => $poli->slug]) !!}">{!! $poli->title !!}</a>
                    </figcaption>
                    <p>{!! $poli->excerpt() !!}<a href="{!! $poli->path() !!}" class="btn btn-link">Read More</a></p>
                  </figure>
                </li>
                  @empty
                    <img src="{!! asset('static/surprised.jpg') !!}" width="100" height="100" align="left" alt="No {!! $poliCart->name !!} Videos">
                    <span style="color: black;font-size: 20px">
                      Sorry Esteemed viewer. We are yet to publish <span style="color: red;margin: 1em;"> {!! $poliCart->name !!} Videos. </span> Keep in touch. Thank you.
                    </span>
                  @endforelse
                @endif
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
                @if(!empty($poliSides))
                  @foreach($poliSides as $poliSide)
                <li>
                  <div class="media wow fadeInDown"> 
                    <figure>
                      <video width="150" height="84.5" controls> 
                      <source type="video/mp4" src="{!! $poliSide->videoUrl() !!}" alt="{!! $poliSide->title !!}">
                      <source type="video/ogg" src="{!! $poliSide->videoUrl() !!}" alt="{!! $poliSide->title !!}">  
                      <source type="video/webm" src="{!! $poliSide->videoUrl() !!}" alt="{!! $poliSide->title !!}">
                      <embed src="{!! $poliSide->videoUrl() !!}" type="application/x-shockwave-flash" width="150" height="84.5" allowscriptaccess="always" allowfullscreen="true"> 
                      This browser doesn't support video tag.
                      </video>
                    </figure>
                    <div class="media-body"> 
                      <a href="{!! route('users.videos.read',['slug' => $poliSide->slug]) !!}" class="catg_title">
                        {!! $poliSide->title !!}
                      </a> 
                    </div>
                  </div>
                </li>
                  @endforeach
                @endif
              </ul>
            </div>
          </div>

          <div class="single_post_content">
            <h2><span>{!! $tecCart->name !!} Videos</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                @if(!empty($tecArticles))
                  @forelse($tecArticles as $tecArticle)
                <li>
                  <figure class="bsbig_fig">
                    <figure>
                      <video width="300" height="169" controls> 
                        <source type="video/mp4" src="{!! $tecArticle->videoUrl() !!}" alt="{ !! $tecArticle->title !!}">
                        <source type="video/ogg" src="{!! $tecArticle->videoUrl() !!}" alt="{!! $tecArticle->title !!}">   
                        <source type="video/webm" src="{!! $tecArticle->videoUrl() !!}" alt="{!! $tecArticle->title!!}">
                        <embed src="{!! $tecArticle->videoUrl() !!}" type="application/x-shockwave-flash" width="300" height="169" allowscriptaccess="always" allowfullscreen="true"> 
                        This browser doesn't support video tag.
                      </video>
                    <figcaption> 
                      <a href="{!! route('users.videos.read', ['slug' => $tecArticle->slug]) !!}">
                        {!! $tecArticle->title !!}
                      </a>
                    </figcaption>
                    <p>{!! $tecArticle->excerpt() !!}<a href="{!! $tecArticle->path() !!}" class="btn btn-link">Read More</a></p>
                  </figure>
                </li>
                  @empty
                    <img src="{!! asset('static/surprised.jpg') !!}" width="100" height="100" align="left" alt="No {!! $tecCart->name !!} Videos">
                    <span style="color: black;font-size: 20px">
                      Sorry Esteemed viewer. We are yet to publish <span style="color: red;margin: 1em;"> {!! $tecCart->name !!} Videos. </span> Keep in touch. Thank you.
                    </span>
                  @endforelse
                @endif
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
                @if(!empty($tecSides))
                  @foreach($tecSides as $tecSide)
                <li>
                  <div class="media wow fadeInDown"> 
                    <figure>
                      <video width="150" height="84.5" controls> 
                      <source type="video/mp4" src="{!! $tecSide->videoUrl() !!}" alt="{!! $tecSide->title !!}">
                      <source type="video/ogg" src="{!! $tecSide->videoUrl() !!}" alt="{!! $tecSide->title !!}">  
                      <source type="video/webm" src="{!! $tecSide->videoUrl() !!}" alt="{!! $tecSide->title !!}">
                      <embed src="{!! $tecSide->videoUrl() !!}" type="application/x-shockwave-flash" width="150" height="84.5" allowscriptaccess="always" allowfullscreen="true"> 
                      This browser doesn't support video tag.
                      </video>
                    </figure>
                    <div class="media-body"> 
                      <a href="{!! route('users.videos.read',['slug' => $tecSide->slug]) !!}" class="catg_title">
                        {!! $tecSide->title !!}
                      </a> 
                    </div>
                  </div>
                </li>
                  @endforeach
                @endif
              </ul>
            </div>
          </div>
            
          <div class="single_post_content">
            <h2><span>All Videos</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav">
                @if(!empty($allVideos))
                  @forelse($allVideos as $video)
                <li>
                  <figure class="bsbig_fig  wow fadeInDown">
                    <figure>
                      <video width="512" height="288" controls> 
                        <source type="video/mp4" src="{!! $video->videoUrl() !!}" alt="{!! $video->title !!}">
                        <source type="video/ogg" src="{!! $video->videoUrl() !!}" alt="{!! $video->title !!}">   
                        <source type="video/webm" src="{!! $video->videoUrl() !!}" alt="{!!$video->title !!}">
                        <embed src="{!! $video->videoUrl() !!}" type="application/x-shockwave-flash" width="512" height="288" allowscriptaccess="always" allowfullscreen="true"> 
                        This browser doesn't support video tag.
                      </video>
                    <figcaption> 
                      <a href="{!! route('users.videos.read', ['slug' => $video->slug]) !!}">{!! $video->title !!}</a> 
                    </figcaption>
                    <p>{!! $video->excerpt() !!}<a href="{!! $video->path() !!}" class="btn btn-link">Read More</a></p>
                  </figure>
                </li>
                  @empty
                    <img src="{!! asset('static/surprised.jpg') !!}" width="100" height="100" align="left" alt="No Videos">
                    <span style="color: black;font-size: 20px">
                      Sorry Esteemed viewer. We are yet to publish <span style="color: red;margin: 1em;"> Videos. </span> Keep in touch. Thank you.
                    </span>
                  @endforelse
                @endif
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
                @if(!empty($allVidSides))
                  @foreach($allVidSides as $allVidSide)
                <li>
                  <div class="media wow fadeInDown"> 
                  <figure>
                    <video width="150" height="84.5" controls> 
                      <source type="video/mp4" src="{!! $allVidSide->videoUrl() !!}" alt="{!! $allVidSide->title !!}">
                      <source type="video/ogg" src="{!! $allVidSide->videoUrl() !!}" alt="{!! $allVidSide->title !!}">     
                      <source type="video/webm" src="{!! $allVidSide->videoUrl() !!}" alt="{!! $allVidSide->title !!}">
                      <embed src="{!! $allVidSide->videoUrl() !!}" type="application/x-shockwave-flash" width="150" height="84.5" allowscriptaccess="always" allowfullscreen="true"> 
                      This browser doesn't support video tag.
                    </video>
                  </figure>
                    <div class="media-body"> 
                      <a href="{!! route('users.videos.read',['slug'=>$allVidSide->slug]) !!}" class="catg_title">
                        {!! $allVidSide->title !!}
                      </a> 
                    </div>
                  </div>
                </li>
                  @endforeach
                @endif
              </ul>
            </div>
          </div>
          @include('user.videos.tags')
          @include('user.newsletter.newsletter')
          <br/><br/>
        </div>
      </div>
      @include('partials.aside_videoextension')
    </div>
  </section>