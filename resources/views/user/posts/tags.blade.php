<div class="tags">
	<strong>Tags:</strong>
	@if(!empty($tags))
	@foreach($tags as $tag)
		<a href="{{route('post.tags',['slug' => $tag->slug])}}">
            <label class="label label-info mg2px">{{$tag->name}}</label>
        </a>
    @endforeach
    @endif
</div>