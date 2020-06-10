<div class="tags">
   <strong>Tags:</strong>
   	@foreach($video->tags as $tag)
  		<a href="{{route('video.tags',['slug' => $tag->slug])}}">
       		<label class="label label-info">{{$tag->name}}</label>
   		</a>
  	@endforeach
</div>