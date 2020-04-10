<div>
	<h4 class="title"> 
		<span class="badge badge-secondary badge-pill">
			<i class="fa fa-comments" style="margin: 3px"></i>
			{{$video->comments->count()}} {{ Str::plural('comment',$video->comments->count())}}
		</span>
	</h4>
	<br/>
@if(!empty($video->comments))
@foreach($video->comments as $comment)
	<div>
		@if(!empty($comment->user->avatar))
			<img width="30" height="30" style="float: left" src = "/storage/avatars/{{$comment->user->avatar }}"/>
		@else
			<img width="30" height="30" src="{{asset('static/avatar.png')}}"/>
		@endif
	</div>
	<strong style="margin-left: 5px"> {{$comment->user->name}} </strong>
	<div style="color: blue;"> <i style="margin-left: 5px">{{$comment->created_date}} </i> </div>
	<div style="margin-top: 5px"> {{$comment->content}}. </div>
	<hr/>
@endforeach
@endif
</div>