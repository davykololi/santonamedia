<div>
	<h4 class="title"> 
		<span class="badge badge-secondary badge-pill">
			{{$post->comments->count()}} {{ Str::plural('comment',$post->comments->count())}}
		</span>
	</h4>
	<br/>
@if(!empty($post->comments))
@foreach($post->comments as $comment)
	<div>
		@if(!empty($comment->user->avatar))
			<img width="30" height="30" class="rounded-circle mr-3" src = "/storage/avatars/{{$comment->user->avatar }}"/>
		@else
			<img width="30" height="30" class="rounded-circle mr-3" src="{{asset('static/avatar.png')}}"/>
		@endif
	</div>
	<strong> {{$comment->user->name}} : </strong>
	<span> {{$comment->content}}. </span>
	 <span style="color: blue"> <i>{{$comment->created_date}} </i> </span>
	 <hr/>
@endforeach
@endif
</div>