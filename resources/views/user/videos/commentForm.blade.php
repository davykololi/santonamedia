<div class="comment-form">
<h5>Comment:<i style="color: blue">You must login to comment.</i></h5>
<form method="post" action="{!! route('comments.store') !!}">
	@csrf
	<div class="form-group">
		<textarea class="form-control" name="content" placeholder="Comment here"></textarea>
		<input type="hidden" name="commentable_id" value="{!! $video->id !!}">
		<input type="hidden" name="commentable_type" value="App\Models\Video">
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-theme" value="Submit"/>
	</div>
</form>
</div>