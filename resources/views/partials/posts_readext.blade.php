<div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Latest {!! $category->name !!} Articles</span></h2>
            <ul class="spost_nav">
              @foreach($archives as $jc)
              <li>
                <div class="media wow fadeInDown"> 
                  <a href="{!! $jc->path() !!}" class="media-left"> 
                    <img src="{!! $jc->imageUrl() !!}" alt="{!! $jc->title !!}"/> 
                  </a>
                  <div class="media-body"> 
                    <a href="{!! $jc->path() !!}" class="catg_title"> 
                      {!! $jc->title !!}
                    </a> 
                  </div>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
        </aside>
</div>