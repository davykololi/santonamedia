@forelse($archives as $archive)
<div class="container">
    <div class="row">
    	<div class="col-md-12">
        	<a href="{{ route('users.posts.read', ['post_slug' => $archive->slug]) }}">
            	<img class="float-left pull-left mr-2 clearfix" width="40" src ="/storage/public/storage/{{ $archive->image }}" alt ="{{ $archive->title }}"/>
        	</a>
    	<h5 style="display: inline;">
        	<a href="{{ route('users.posts.read', ['post_slug' => $archive->slug]) }}">
            	{!! $archive->title !!}
        	</a>
    	</h5>
		</div>
    </div>
</div>
@empty
    <p style="color: red">None</p>
@endforelse
