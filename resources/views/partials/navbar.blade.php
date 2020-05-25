<!-- navbar -->  	
    <nav class="navbar navbar-expand-lg fixed-top">
        <a class="navbar-brand" href="{{ url('santonamedia.com') }}">
            <span style="font-family: FELIX TITLING;font-size: 30px;">
                SANTONA MEDIA
            </span>
        </a>
        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('home')}}"><i><span class="fa fa-home" style="margin: 2px"> 
                        </span></i>HOME<span class="sr-only">(current)</span>
                    </a>
                </li> 
                <li><a class="nav-link" href="{{route('users.pages.about')}}"> ABOUT </a></li>
                <li><a class="nav-link" href="{{ route ('users.pages.contact') }}"> CONTACT US </a></li>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button" v-pre style="margin-top: 11px">
                        <span> NEWS </span>
                    </a>
                <div class="dropdown-menu" aria-labelled="dropdownLink">      
                @if(!empty($navs))
                    @foreach($navs as $category)
                    <li class="nav-item active">
                        <a class="dropdown-item" href="{{route('category.articles',['slug' => $category->slug])}}">
                        {{ $category->name }}
                        </a>
                    </li>   
                    @endforeach
                @endif
                </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button" v-pre style="margin-top: 11px">
                        <span> VIDEOS </span>
                    </a>
                <div class="dropdown-menu" aria-labelled="dropdownLink">
                @if(!empty($navs))
                    @foreach($navs as $category)
                    <li class="nav-item active">
                        <a class="dropdown-item" href="{{route('category.videos',['slug' => $category->slug])}}">
                        {{ $category->name }}
                        </a>
                    </li>
                    @endforeach
                @endif 
                </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button" v-pre style="margin-top: 11px">
                        <span> SPA NEWS </span>
                    </a>
                <div class="dropdown-menu" aria-labelled="dropdownLink">
                @if(!empty($tags))
                    @foreach($tags as $tag)
                    <li class="nav-item active">
                        <a class="dropdown-item" href="{{route('post.tags',['slug' => $tag->slug])}}">
                            {{ $tag->name }}
                        </a>
                    </li>
                    @endforeach
                @endif 
                </div>
                </div> 
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button" v-pre style="margin-top: 11px">
                        <span> SPA VIDEOS </span>
                    </a>
                <div class="dropdown-menu" aria-labelled="dropdownLink">
                @if(!empty($tags))
                    @foreach($tags as $tag)
                    <li class="nav-item active">
                        <a class="dropdown-item" href="{{route('video.tags',['slug' => $tag->slug])}}">
                            {{ $tag->name }}
                        </a>
                    </li>
                    @endforeach
                @endif 
                </div>
                </div>   
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
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
                            <img width="25" height="25" class="rounded-circle" src = "/storage/avatars/{{Auth::user()->avatar }}" onerror="this.src='{{asset('static/avatar.png')}}'" style="margin: 6px;margin-top: 0px;margin-bottom: 0px">
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
</nav>  