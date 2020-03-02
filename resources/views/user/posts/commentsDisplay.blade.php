<div>
	<h4 class="title" class="blue"> Comments</h4>
@if(!empty($post->comments))
@foreach($post->comments as $comment)
	<div>
		@if(!empty($comment->user->avatar))
		<img width="30" height="30" class="rounded-circle" src="/static/avatar.png"/>
		@else
		<img width="30" height="30" class="rounded-circle" src = "/storage/avatars/{{$comment->user->avatar }}">
		@endif
	</div>
	<span> {{$comment->content}} </span>By:
	<strong> {{$comment->user->name}} </strong>
	 {{$comment->created_date}}
	 <hr/>
@endforeach
@endif
</div>