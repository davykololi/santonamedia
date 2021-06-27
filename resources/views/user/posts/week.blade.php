<div>
	@if(!empty($articles))
	@foreach($articles as $article)
	<li class="nav-link">
		<a id="white" href="{!! $article->path() !!}"> {!! $post->title !!} </a>
	</li>
	@endforeach
	@endif
</div>