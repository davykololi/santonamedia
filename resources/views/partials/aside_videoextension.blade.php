<div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Popular Videos</span></h2>
            <ul class="spost_nav">
              @if(!empty($trendings))
              @foreach($trendings as $pop)
              <li>
                <div class="media wow fadeInDown"> 
                  <video width="150" height="84.5" controls>
                    <source type="video/mp4" src="{!! $pop->videoUrl() !!}" alt="{!! $pop->title !!}">
                    <source type="video/ogg" src="{!! $pop->videoUrl() !!}" alt="{!! $pop->title !!}">
                    <source type="video/webm" src="{!! $pop->videoUrl() !!}" alt="{!! $pop->title !!}">
                      This browser doesn't support video tag.
                  </video>
                  <div class="media-body"> 
                    <a href="{!! $pop->path() !!}" class="catg_title"> 
                      {!! $pop->title !!}
                    </a> 
                  </div>
                </div>
              </li>
              @endforeach
              @endif
            </ul>
          </div>
          <div class="single_sidebar">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">Category</a></li>
              <li role="presentation"><a href="#video" aria-controls="profile" role="tab" data-toggle="tab">Video</a></li>
              <li role="presentation"><a href="#comments" aria-controls="messages" role="tab" data-toggle="tab">Comments</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="category">
                <ul>
                  @if(!empty($categories))
                    @foreach($categories as $category)
                  <li class="cat-item">
                    <a href="{!! $category->videoPath() !!}">
                      {!! $category->name !!}
                    </a>
                  </li>
                    @endforeach
                  @endif
                </ul>
              </div>
              <div role="tabpanel" class="tab-pane" id="video">
                <div class="vide_area">
                  <iframe width="100%" height="250" src="http://www.youtube.com/embed/h5QWbURNEpA?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="comments">
                <ul class="spost_nav">
                  <li>
                    <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="../images/post_img1.jpg"> </a>
                      <div class="media-body"> <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="../images/post_img2.jpg"> </a>
                      <div class="media-body"> <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="../images/post_img1.jpg"> </a>
                      <div class="media-body"> <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="../images/post_img2.jpg"> </a>
                      <div class="media-body"> <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Sponsor</span></h2>
            <a class="sideAdd" href="#"><img src="../images/add_img.jpg" alt=""></a> </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Category Archive</span></h2>
            <select class="catgArchive">
              Select Category 
              @if(!empty($categories))
                @foreach($categories as $category)
              <option>
                <a href="{!! $category->videoPath() !!}">
                  {!! $category->name !!}
                </a>
              </option>
                @endforeach
              @endif
              </select>
          </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Links</span></h2>
            <ul>
              <li><a href="{!! url('/') !!}">Home</a></li>
              <li><a href="{!! route('users.pages.about') !!}">About</a></li>
              <li><a href="{!! route ('users.pages.contact') !!}">Contact</a></li>
              <li><a href="{!! route ('private.policy') !!}">Private Policy</a></li>
              <li><a href="{!! route ('pages.portfolio') !!}">Portfolio</a></li>
              @if(!empty($categories))
                @foreach($categories as $category)
              <li>
                <a href="{!! $category->videoPath() !!}">{!! $category->name !!}</a></li>
                @endforeach
              @endif
            </ul>
          </div>
        </aside>
      </div>