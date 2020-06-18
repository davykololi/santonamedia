<div class="tags">
   	<strong>Tags:</strong>
    @forelse ($post->tags as $tag)
    	<a href="{{route('post.tags',['slug' => $tag->slug])}}">                        	
        	<span class="label label-info">{{ $tag->name }}</span>                        	
    	</a>
	@empty
    	<span class="label label-danger">No tag found.</span>
	@endforelse
</div>



