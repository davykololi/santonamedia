<div class="sidebar-header">
   @forelse($archives as $archive)
   	<div class="image-aside">
    	<img class="ri" src="/storage/public/storage/{{ $archive->image }}" alt ="{{ $archive->title }}"/> 
        <a href="{{ route('users.posts.read', ['post_slug' => $archive->slug]) }}">
          {!! $archive->title !!}
        </a>
    </div> 
   @empty
   	<p style="color: red">None</p>
	@endforelse
</div>          
