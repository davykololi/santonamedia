<aside class="col-sm-3 ml-sm-auto blog-sidebar" id="aside">
    <div class="sidebar-module">
        <br/>
        <h4 class="franklin" id="as">LATEST {!! $category->name !!} ARTICLES </h4>
            @forelse($archives as $archive)
                <ol class="list-unstyled">
                    <li>
                        <a id="white" href="{{ route('users.posts.read', ['post_slug' => $archive->slug]) }}">{!! \Illuminate\Support\Str::words($archive->title, 6, '...') !!}
                        </a>
                    </li>
                </ol>
            @empty
            <p style="color: red">None</p>
            @endforelse
    </div>
    <div class="sidebar-module">
        <br/>
        <h4 class="franklin" id="as">CATEGORIES </h4>
        @if(!empty($categories))
            @foreach($categories as $category)
                <a class="nav-link" id="white" href="{{route('categories',['slug' => $category->slug])}}">{{$category->name}}</a>
            @endforeach
        @endif
    </div>

    <div class="sidebar-module">
        <br/>
        <h4 class="franklin" id="as">POPULAR POSTS </h4>
        @include('user.posts.popular')
    </div>

    <div class="sidebar-module">
        <br/>
        <h4 class="franklin" id="as">LAST WEEK POSTS </h4>
        @include('user.posts.week')
    </div>
</aside><!-- /.blog-sidebar -->