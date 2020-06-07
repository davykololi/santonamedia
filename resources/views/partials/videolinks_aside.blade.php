<div class="sidebar-header">
	<div class="latest_post">
    	<div class="latest_post_container">
        	@forelse($archives as $archive)
            	<div class="latest_postnav">
                	<div class="media"> 
                		<video class="media-left" width="40" controls> 
       						<source src="/storage/public/videos/{{ $archive->video }}" alt ="{{ $archive->title }}">
    					</video>
                		</a>
                  		<div class="media-body"> 
                  			<a href="{{ route('users.videos.read',['video_slug' => $archive->slug]) }}" class="catg_title">
                  			 	{!! $archive->title !!}
                  			</a> 
                  		</div>
                	</div>
            	</div>
            @empty
    		<p style="color: red">None</p>
			@endforelse
      </div>
	</div>
</div>