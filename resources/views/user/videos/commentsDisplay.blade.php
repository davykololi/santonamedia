<div>
	<h4 class="title"> 
		<span class="badge badge-secondary badge-pill">
			{{$video->comments->count()}} {{ Str::plural('comment',$video->comments->count())}}
		</span>
	</h4>
	<br/>
@if(!empty($video->comments))
@foreach($video->comments as $comment)
	<div>
		@if(empty($comment->user->avatar))
		<img width="30" height="30" class="rounded-circle" src="/static/avatar.png"/>
		@else
		<img width="30" height="30" class="rounded-circle" src = "/storage/avatars/{{$comment->user->avatar }}">
		@endif
	</div>
	<strong> {{$comment->user->name}} : </strong>
	<span> {{$comment->content}}. </span>
	<span style="color: blue"> <i>{{$comment->created_date}} </i> </span>
	<hr/>
@endforeach
@endif
</div>