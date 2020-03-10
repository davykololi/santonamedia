<form method="post" action="{{route('comments.store')}}">
	@csrf
	<div class="form-group">
		<textarea class="form-control" name="content" placeholder="Comment here"></textarea>
		<input type="hidden" name="post_id" value="{{$post->id}}">
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn" id="button" value="Submit"/>
	</div>
</form>