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
              <li><a href="{!! $category->path() !!}">{{ $category->name }}</a></li>
                @endforeach
              @endif
            </ul>
          </li>

          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Videos</a>
            <ul class="dropdown-menu" role="menu">
              @if(!empty($navs))
                @foreach($navs as $category)
              <li><a href="{!! $category->videoPath() !!}">{{ $category->name }}</a></li>
                @endforeach
              @endif
            </ul>
          </li>

          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">News Tags</a>
            <ul class="dropdown-menu" role="menu">
              @if(!empty($tags))
                @foreach($tags as $tag)
              <li><a href="{!! $tag->path() !!}">{{ $tag->name }}</a></li>
                @endforeach
              @endif
            </ul>
          </li>

          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Video Tags</a>
            <ul class="dropdown-menu" role="menu">
              @if(!empty($tags))
                @foreach($tags as $tag)
              <li><a href="{!! $tag->videoPath() !!}">{{ $tag->name }}</a></li>
                @endforeach
              @endif
            </ul>
          </li>
          <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('SIGNIN') }}
                            <i class="fa fa-sign-in" aria-hidden="true"></i>
                        </a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('SIGNUP') }}
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </a>
                    </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img width="25" height="25" class="rounded-circle" src="/storage/avatars/{{Auth::user()->avatar }}" onerror="this.src='{{asset('static/avatar.png')}}'" style="margin: 6px;margin-top: 0px;margin-bottom: 0px">
                            <span>{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/profile">
                                Profile
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            <li class="nav-item">@include('user.search')</li>
        </ul>
      </div>
    </nav>
  </section>