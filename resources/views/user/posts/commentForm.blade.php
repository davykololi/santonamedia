<div class="comment-form">
<h5>Comment:<i style="color: blue;margin: 1em;">Leave Your Comment.</i></h5>
<form method="post" action="{!! route('comments.store') !!}">
	@csrf
	<div class="form-group">
		<textarea class="form-control" name="content" placeholder="Comment here"></textarea>
		<input type="hidden" name="commentable_id" value="{!! $post->id !!}">
		<input type="hidden" name="commentable_type" value="App\Models\Post">
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-theme">Submit</button>
	</div>
</form>
</div>