<header>
<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
            <div class="ui container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <span style="font-family: Arial Black" id="firebrick">{{ strtoupper(config('app.name', 'Skyluxnews')) }} BLOG</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a id="firebrick" class="nav-link" href="{{route('home')}}">HOME <span class="sr-only">(current)</span></a>
                        </li> 
                        <li class="nav-item active">
                            <a id="firebrick" class="nav-link" href="{{route('users.pages.about')}}">ABOUT US</a>
                        </li>
                        <li class="nav-item active">
                            <a id="firebrick" class="nav-link" href="{{ route('users.pages.contact') }}">CONTACT US</a>
                        </li>          
                        @if(!empty($navs))
                                @foreach($navs as $category)
                        <li class="nav-item active">
                                <a id="firebrick" class="nav-link" href="{{route('categories',['slug' => $category->slug])}}">{{$category->name}}</a>
                        </li>
                                @endforeach
                        @endif  
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" id="all" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" id="all" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img width="30" height="30" class="rounded-circle" src = "/storage/avatars/{{Auth::user()->avatar }}">
                                    {{ Auth::user()->name }} <span class="caret"></span>
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
</nav>
</header>

