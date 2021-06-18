<div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Latest news</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
              <li>
                @foreach($allPostsSide as $arc)
                <div class="media"> 
                  <a href="{!! $arc->path() !!}" class="media-left"> 
                    <img src="{!! $arc->imageUrl() !!}" alt="{!! $arc->title !!}"/> 
                  </a>
                  <div class="media-body"> 
                    <a href="{!! $arc->path() !!}" class="catg_title">
                      {!! $arc->title !!}
                    </a> 
                    <p><i>{!! $arc->created_date !!}</i></p>
                  </div>
                </div>
                @endforeach
              </li>
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
</div>