@forelse($archives as $archive)
    <h6> 
        <strong>
            <a class="asac black" href="{{ route('users.posts.read', ['post_slug' => $archive->slug]) }}">
                {!! \Illuminate\Support\Str::words($archive->title, 6, '...') !!}
            </a>
        </strong>
    </h6>
    <div class="asidespan">
        <img class="asideimg" src ="/storage/public/storage/{{ $archive->image }}" alt ="{{ $archive->title }}"/>
        <br/>
            <p class="ascontent">{!! $archive->content !!}</p>
    </div>
    <hr>
@empty
    <p style="color: red">None</p>
@endforelse
</div>
@include('partials.categories')
@include('partials.ext_aside')