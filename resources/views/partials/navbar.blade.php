<section id="navArea">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav main_nav">
          <li class="active"><a href="{{url('/')}}"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
          <li><a href="#">Technology</a></li>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">News</a>
            <ul class="dropdown-menu" role="menu">
              @if(!empty($navs))
                @foreach($navs as $category)
              <li><a href="{{route('category.articles',['slug' => $category->slug])}}">{{ $category->name }}</a></li>
                @endforeach
              @endif
            </ul>
          </li>
            

          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Videos</a>
            <ul class="dropdown-menu" role="menu">
              @if(!empty($navs))
                @foreach($navs as $category)
              <li><a href="{{route('category.videos',['slug' => $category->slug])}}">{{ $category->name }}</a></li>
                @endforeach
              @endif
            </ul>
          </li>

          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">News Tags</a>
            <ul class="dropdown-menu" role="menu">
              @if(!empty($tags))
                @foreach($tags as $tag)
              <li><a href="{{route('post.tags',['slug' => $tag->slug])}}">{{ $tag->name }}</a></li>
                @endforeach
              @endif
            </ul>
          </li>

          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Video Tags</a>
            <ul class="dropdown-menu" role="menu">
              @if(!empty($tags))
                @foreach($tags as $tag)
              <li><a href="{{route('video.tags',['slug' => $tag->slug])}}">{{ $tag->name }}</a></li>
                @endforeach
              @endif
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </section>