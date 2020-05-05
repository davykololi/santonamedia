@forelse($archives as $archive)
    <h6> 
        <strong>
            <a class="asac black" href="{{ route('users.videos.read', ['video_slug' => $archive->slug]) }}">
                {!! \Illuminate\Support\Str::words($archive->title, 6, '...') !!}
            </a>
        </strong>
    </h6>
    <div class="asidespan">
        <video width="40" height="30" class="asideimg" controls> 
            <source src = "/storage/public/videos/{{ $archive->video }}" alt ="{{ $archive->title }}">
        </video>
        <br/>
            <p class="ascontent">{!! $archive->content !!}</p>   
    </div>
@empty
    <p style="color: red">None</p>
@endforelse
    </div>
@include('partials.categories')
@include('partials.ext_aside')