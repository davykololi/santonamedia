<!--admin navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ url('/') }}">
            <span style="font-family: FELIX TITLING;font-size: 30px;" class="white">
                NEWSSTADIA<img width ="30px" height="30px" src= "{{asset('static/logo.png')}}" alt="News Stadia Logo" loading="auto">
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('superadmin.posts.index')}}">POSTS</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('superadmin.videos.index')}}">VIDEOS</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('superadmin.admins.index')}}">ADMINS</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('superadmin.categories.index')}}">CATEGORIES</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('superadmin.tags.index')}}">TAGS</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('superadmin.comments.index')}}">COMMENTS</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span>{{ Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('superadmin.change-password.form')}}">Change Password</a>
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
    </nav>