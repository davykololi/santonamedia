<aside class="col-sm-3 ml-sm-auto blog-sidebar" id="aside">
    <div class="sidebar-module">
        <br/>
        <h4 class="astitle">LATEST {!! strtoupper($category->name) !!} VIDEOS </h4>
            @forelse($archives as $archive)
            <span class="asidespan">
                <video width="40" height="30" class="asideimg" controls> 
                    <source src = "/storage/public/videos/{{ $archive->video }}" alt ="{{ $archive->title }}">
                </video>
            <br/>
                <ul class="list-unstyled top-10">
                    <li>
                        <a class="asac white" style="font-size: 15px;" href="{{ route('users.videos.read', ['video_slug' => $archive->slug]) }}">
                            {!! \Illuminate\Support\Str::words($archive->title, 6, '...') !!}
                        </a>
                    </li>
                </ul>
            </span>
            @empty
            <p style="color: red">None</p>
            @endforelse
    </div>
    @include('partials.categories')
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