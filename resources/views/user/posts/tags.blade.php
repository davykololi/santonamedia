<div class="tags">     
	<strong>Tags:</strong>
	@if(!empty($tags))
	@forelse ($tags as $tag)
            <a href="{!! $tag->path() !!}">
    	       <span class="label label-info" style="margin: 5px;display: inline-block;">{!! $tag->name !!}</span>
            </a>
    @empty
    	<span class="label label-danger">No tag found.</span>
    @endforelse
    @endif
</div>
                          