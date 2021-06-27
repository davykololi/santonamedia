<div class="container" style="margin-top: 20px">
	<div class="row">
		<h5>7 DAYS POSTS</h5>
		@if(!empty($data))
			@forelse($data as $post)
				<p><b>{!! $post->title !!}</b></p>
			@empty
				<p>No 7 Days Posts</p>
			@endforelse
		@endif
	</div>
</div>