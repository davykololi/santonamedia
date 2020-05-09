@forelse($archives as $archive)
    <span class="asidespan">
        <video width="40" height="30" class="asideimg" controls> 
            <source src = "/storage/public/videos/{{ $archive->video }}" alt ="{{ $archive->title }}">
        </video>
        <br/>
            <ul class="list-unstyled">
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