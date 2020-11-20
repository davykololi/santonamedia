<div>
	<h4 class="title"> 
		<span class="badge badge-secondary badge-pill">
			<i class="fa fa-comments" style="margin: 3px"></i>	
			{!! $post->comments_count !!} {!! Str::plural('comment',$post->comments_count) !!}
		</span>
	</h4>
	<br/>
	@if(!empty($post->comments))
		@forelse($post->comments as $comment)
			<img width="30" height="30" style="float: left" src="/storage/avatars/{!! $comment->user->avatar !!}" onerror="this.src='{!! asset('static/avatar.png') !!}'" loading="lazy" />
			<strong style="margin-left: 5px"> {!! $comment->user->name !!} </strong>
			<div style="margin-top: 5px"> 
				{!! $comment->content !!}. 
				<span style="color: blue;"> 
					<i style="margin-left: 5px">{!! $comment->created_date !!} </i> 
				</span>
			</div>
	<hr/>
		@empty
			<p style="color: #000000;font-size: 16px;">No comments yet.</p>
		@endforelse
	@endif
</div>