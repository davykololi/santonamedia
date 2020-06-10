<div class="tags">
   	<strong>Tags:</strong>
    @foreach($post->tags as $tag)
    	<a href="{{route('post.tags',['slug' => $tag->slug])}}">
            <label class="label label-info">{{$tag->name}}</label>
        </a>
    @endforeach
</div>