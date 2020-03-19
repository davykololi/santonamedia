<aside class="col-sm-3 ml-sm-auto blog-sidebar" id="aside">
    <div class="sidebar-module">
        <br/>
        <h4 class="astitle">LATEST {!! $category->name !!} VIDEOS </h4>
            @forelse($archives as $archive)
            <span style="display: flex;background-color: lightgray;margin-top: 3px;margin-bottom: 5px">
                <video width="40" height="30" style="float: left;margin: 10px 10px 0;margin-bottom: 10px;border: ridge;border-color: white" controls> 
                    <source src = "/storage/public/videos/{{ $archive->video }}" alt ="{{ $archive->title }}">
                </video>
            <br/>
                <ul class="list-unstyled top-10">
                    <li>
                        <a class="asac" style="font-size: 15px;" href="{{ route('users.videos.read', ['video_slug' => $archive->slug]) }}">
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
        <h4 class="astitle">VIDEO CATEGORIES </h4>
        <br/>
        @if(!empty($categories))
            @foreach($categories as $category)
                <ul class="list-unstyled">
                    <li>
                        <a class="asc" href="{{route('category.videos',['slug' => $category->slug])}}">
                            {{$category->name}}
                        </a>
                    </li>
                </ul>
            @endforeach
        @endif
    </div>

    <div class="sidebar-module">
        <br/>
        <h4 class="astitle">TRENDING ARTICLES </h4>
        @include('user.videos.popular')
    </div>

    <div class="sidebar-module">
        <br/>
        <h4 class="astitle">LAST WEEK ARTICLES </h4>
        @include('user.videos.week')
    </div>
</aside><!-- /.blog-sidebar -->