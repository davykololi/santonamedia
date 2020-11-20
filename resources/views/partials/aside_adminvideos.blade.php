<div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Latest {!! $admin->name !!}'s' Videos</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
              <li>
                @foreach($adminVidSides as $py)
                <div class="media">
                  <figure>
                    <video width="150" height="84.5" controls> 
                      <source type="video/mp4" src="{!! $py->videoUrl() !!}" alt="{!! $py->title !!}">
                      <source type="video/ogg" src="{!! $py->videoUrl() !!}" alt="{!! $py->title !!}">     
                      <source type="video/webm" src="{!! $py->videoUrl() !!}" alt="{!! $py->title !!}"> 
                      This browser doesn't support video tag.
                    </video>
                  </figure>
                  <div class="media-body"> 
                    <a href="{!! $py->path() !!}" class="catg_title">
                      {!! $py->title !!}
                    </a> 
                  </div>
                </div>
                @endforeach
              </li>
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
</div>