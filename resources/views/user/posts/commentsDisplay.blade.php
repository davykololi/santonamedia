<div>
	<h4 class="title" class="blue"> Comments</h4>
@if(!empty($post->comments))
@foreach($post->comments as $comment)
	<div>
		@if(!empty($comment->user->avatar))
		<img width="30" height="30" class="rounded-circle mr-3" src = "/storage/avatars/{{$comment->user->avatar }}">
		@else
			<img width="30" height="30" class="rounded-circle" src="/static/avatar.png"/>
		@endif
	</div>
	<strong> {{$comment->user->name}} : </strong>
	<span> {{$comment->content}}. </span>
	 <span style="color: blue"> <i>{{$comment->created_date}} </i> </span>
	 <hr/>
@endforeach
@endif
</div>