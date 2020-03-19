<div>
	@if(!empty($articles))
	@foreach($articles as $article)
	<li class="nav-link">
		<a id="white" href="{{ route('users.posts.read', ['post_slug' => $post->slug]) }}"> {!! $post->title !!} </a>
	</li>
	@endforeach
	@endif
</div>