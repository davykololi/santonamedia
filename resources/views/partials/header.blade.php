  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav">
              <li><a href="{{url('/')}}">Home</a></li>
              <li><a href="{{route('users.pages.about')}}">About</a></li>
              <li><a href="{{ route ('users.pages.contact') }}">Contact</a></li>
            </ul>
          </div>
          <div class="header_top_right">
            <p><i class="fa fa-clock-o"></i> {!! date('d/m/Y H:i:s') !!}</p>
            <!-- Right Side Of Navbar -->
            <ul class="top_nav">
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
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_bottom">
          <div class="logo_area"><a href="{{url('/')}}" class="logo"><img src="{!! asset('static/logo.png') !!}" alt="santonamedia logo"></a></div>
          <div class="add_banner"><a href="#"><img src="{!! asset('static/addbanner_728x90_V1.jpg') !!}" alt=" santona media banner"></a></div>
        </div>
      </div>
    </div>
  </header>