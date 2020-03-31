<aside class="col-sm-3 ml-sm-auto blog-sidebar" id="aside">
    <div class="sidebar-module">
        <br/>
        <h4 class="astitle">LATEST {!! strtoupper($tag->name) !!} ARTICLES </h4>
            @forelse($archives as $archive)
            <span class="asidespan">
                <img class="asideimg" src ="/storage/public/storage/{{ $archive->image }}" alt ="{{ $archive->title }}"/>
            <br/>
                <ul class="list-unstyled top-10">
                    <li>
                        <a class="asac white" style="font-size: 15px" href="{{ route('users.posts.read', ['post_slug' => $archive->slug]) }}">
                            {!! \Illuminate\Support\Str::words($archive->title, 6, '...') !!}
                        </a>
                    </li>
                </ul>
            </span>
            @empty
            <p style="color: red">None</p>
            @endforelse
    </div>
    <div class="sidebar-module">
        <br/>
        <h4 class="astitle">ARTICLE CATEGORIES </h4>
        <br/>
        @if(!empty($categories))
            @foreach($categories as $category)
                <ul class="list-unstyled">
                    <li>
                        <a class="asc" href="{{route('category.articles',['slug' => $category->slug])}}">
                            {{$category->name}}
                            <span class="badge badge-secondary badge-pill">{{$category->posts->count()}}</span>
                        </a>
                    </li>
                </ul>
            @endforeach
        @endif
    </div>

</aside><!-- /.blog-sidebar -->