@forelse($archives as $archive)
<div class="container">
    <div class="row">
        <div class="col">
        <a href="{{ route('users.posts.read', ['post_slug' => $archive->slug]) }}">
            <img align="left" width="40" src ="/storage/public/storage/{{ $archive->image }}" alt ="{{ $archive->title }}"/>
        </a>
    <h5 style="display: inline;">
        <a href="{{ route('users.posts.read', ['post_slug' => $archive->slug]) }}">
            {!! $archive->title !!}
        </a>
    </h5>
        </div>
    </div>
</div>
@empty
    <p style="color: red">None</p>
@endforelse
