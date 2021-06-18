<div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span> Latest {!! $admin->name !!}'s Articles</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
              <li>
                @foreach($adminPostsSide as $ar)
                <div class="media"> 
                  <a href="{!! $ar->path() !!}" class="media-left"> 
                    <img src="{!! $ar->imageUrl() !!}" alt="{!! $ar->title !!}"/> 
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