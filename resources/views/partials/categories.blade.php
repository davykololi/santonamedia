    <div class="sidebar-module" style="background: url('/static/dk.png');">
        <h4>CATEGORIES </h4>    
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button" v-pre style="margin-top: 11px">
                    <span> NEWS </span>
                </a>
                <div class="dropdown-menu" aria-labelled="dropdownLink">      
                    @if(!empty($categories))
                        @foreach($categories as $category)
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
                    @if(!empty($categories))
                        @foreach($categories as $category)
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
    </div>     