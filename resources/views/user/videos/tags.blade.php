<div class="tags">
	<strong>Tags:</strong>
	@if(!empty($tags))
	@foreach($tags as $tag)
		<a href="{!! $tag->videoPath() !!}">
            <label class="label label-info" style="margin: 5px">{!! $tag->name !!}</label>
        </a>
    @endforeach
    @endif
</div>