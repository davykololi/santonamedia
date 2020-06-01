<div class="sidebar-right" style="margin-top: 10px"> 
    <h4> VIDEO TAGS</h4> 
        <div class="tag-aside">                  
        @if(!empty($tags))
            @foreach($tags as $tag)
                <a class="nav-link" href="{{route('video.tags',['slug' => $tag->slug])}}">
                    {{ $tag->name }}
                </a>
            @endforeach
        @endif 
        </div>
</div>




