<h5 class="blue">Comment:</h5>
<form method="post" action="{{route('comments.store')}}">
	@csrf
	<div class="form-group">
		<textarea class="form-control" name="content" placeholder="Comment here"></textarea>
		<input type="hidden" name="video_id" value="{{$video->id}}">
		<input type="hidden" name="category_id" value="{{$category->id}}">
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn" id="button" value="Submit"/>
	</div>
</form>