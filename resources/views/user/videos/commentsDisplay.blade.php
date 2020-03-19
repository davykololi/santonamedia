<div>
	<h4 class="title" class="blue"> Comments</h4>
@if(!empty($video->comments))
@foreach($video->comments as $comment)
	<div>
		@if($comment->count() == 0)
		<img width="30" height="30" class="rounded-circle" src="/static/avatar.png"/>
		@endif
		@if(!empty($comment->user->avatar))
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