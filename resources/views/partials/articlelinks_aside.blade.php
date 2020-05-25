
@forelse($archives as $archive)
<div class="card">
    <img class="float-left pull-left mr-2" width="50" src="/storage/public/storage/{{ $archive->image }}" alt ="{{ $archive->title }}"/> 
    <a href="{{ route('users.posts.read', ['post_slug' => $archive->slug]) }}">
        {!! $archive->title !!}
    </a>
</div>
@empty
    <p style="color: red">None</p>
@endforelse
