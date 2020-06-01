@forelse($archives as $archive)
<div class="sidebar-header">
    <video class="float-left pull-left mr-2" width="40" controls> 
       <source src="/storage/public/videos/{{ $archive->video }}" alt ="{{ $archive->title }}">
    </video>
    <a href="{{ route('users.videos.read',['video_slug' => $archive->slug]) }}">
        {!! $archive->title !!}
    </a>
</div>  
@empty
    <p style="color: red">None</p>
@endforelse

