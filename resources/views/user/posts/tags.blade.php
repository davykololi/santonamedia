<div class="tags">
	<strong>Tags:</strong>
	@if(!empty($tags))
	@forelse ($tags as $tag)
    <a href="{!! route('post.tags',['slug' => $tag->slug]) !!}">
    	<span class="label label-info">{!! $tag->name !!}</span>
    </a>
    @empty
    	<span class="label label-danger">No tag found.</span>
    @endforelse
    @endif
</div>
                          