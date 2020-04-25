@forelse($archives as $archive)
    <span class="asidespan">
        <img class="asideimg" src ="/storage/public/storage/{{ $archive->image }}" alt ="{{ $archive->title }}"/>
        <br/>
            <ul class="list-unstyled">
                <li>
                    <a class="asac white" href="{{ route('users.posts.read', ['post_slug' => $archive->slug]) }}">
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
@include('partials.ext_aside')