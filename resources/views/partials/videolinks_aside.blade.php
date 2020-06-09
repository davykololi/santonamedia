<div class="sidebar-header">
   @forelse($archives as $archive)
    <div class="image-aside">
      <video class="media-left" width="40" controls> 
        <source src="/storage/public/videos/{{ $archive->video }}" alt ="{{ $archive->title }}">
      </video>
        <a href="{{ route('users.videos.read',['video_slug' => $archive->slug]) }}">
          {!! $archive->title !!}
        </a>
    </div> 
   @empty
    <p style="color: red">None</p>
  @endforelse
</div>     