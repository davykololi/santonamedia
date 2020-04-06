<br/>
<article>
<h6 class="calibri">SANTONA MEDIA {{ strtoupper($video->category->name) }} VIDEO</h6>
<br/>
<h2 class="blog-post-title">
    <a class="title" href="{{ route('users.videos.read', ['video_slug' => $video->slug]) }}" >{{strtoupper($video->title)}}</a>
</h2>
<p class="blog-post-meta">
    <div style="font-family: Calibri Light;font-size: 100%;">
        <strong> By </strong><span class="title" style="color: blue;">{!! $video->admin->name !!}</span>
        	<a style="color: black" href="#"> 
        		<span style="font-size: 13px">
                	{{ date("F j,Y,g:i a",strtotime($video->created_at)) }}
            	</span>
            </a>
    </div>
</p>
<figure>
    <video width="320" height="240" controls poster="{{asset('/static/lion.JPG')}}"> 
        <source type="video/mp4" src = "/storage/public/videos/{{ $video->video }}" alt="{{$video->title}}">
            This browser doesn't support video tag.
    </video>
    <br/>
 	<figcaption> <span id="dimgray"> {{$video->caption}}</span> </figcaption>
</figure>
</article>