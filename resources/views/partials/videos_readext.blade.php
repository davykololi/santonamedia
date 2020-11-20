<div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Latest {!! $category->name !!} Videos</span></h2>
            <ul class="spost_nav">
              @foreach($archives as $video)
              <li>
                <div class="media wow fadeInDown"> 
                  <figure>
                <video width="150" height="84.5" controls>
                  <source type="video/mp4" src="{!! $video->videoUrl() !!}" alt="{!! $video->title !!}">
                  <source type="video/ogg" src="{!! $video->videoUrl() !!}" alt="{!! $video->title !!}">  
                  <source type="video/webm" src="{!! $video->videoUrl() !!}" alt="{!! $video->title !!}"> 
                  This browser doesn't support video tag.
                </video>
                  <div class="media-body"> 
                    <a href="{!! $video->path() !!}" class="catg_title"> 
                      {!! $video->title !!}
                    </a> 
                  </div>
              </figure>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
        </aside>
</div>