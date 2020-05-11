@forelse($archives as $archive)
    <span class="asidespan">
        <a href="{{ route('users.posts.read', ['post_slug' => $archive->slug]) }}">
            <img class="asideimg" id="grayborder" src ="/storage/public/storage/{{ $archive->image }}" alt ="{{ $archive->title }}"/>
        </a>
        <br/>
            <ul class="list-unstyled" style="margin-top: 5px">
                <li>
                    <a class="asac white" href="{{ route('users.posts.read', ['post_slug' => $archive->slug]) }}">
                        {!! strtoupper($archive->title) !!}
                    </a>
                </li>
            </ul>
    </span>
@empty
    <p style="color: red">None</p>
@endforelse
