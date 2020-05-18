<article>
<div class="dad"></div>
<div class="headings">
    <h6>SANTONA MEDIA {{ $tag->name }} {{ $video->category->name }} VIDEO</h6>
</div>
<br/>
<h1 class="feature-title">
    <a class="post-link" href="{{ route('users.videos.read', ['video_slug' => $video->slug]) }}" >{{ $video->title }}</a>
</h1>
<div class="left-ten">
    <div class="created-time">
        <a href="#"> {{ date("F j,Y,g:i a",strtotime($video->created_at)) }} By:</a>
         <span> {!! $video->admin->name !!} </span>
    </div>
    <figure>
        <video width="320" height="240" controls poster="{{asset('/static/lion.JPG')}}"> 
            <source type="video/mp4" src = "/storage/public/videos/{{ $video->video }}" alt="{{$video->title}}">
            <source type="video/ogg" src="/storage/public/videos/{{ $video->video }}" alt="{{$video->title}}">     
            <source type="video/webm" src="/storage/public/videos/{{ $video->video }}" alt="{{$video->title}}"> 
                This browser doesn't support video tag.
        </video>
        <br/>
 	  <figcaption> <span id="dimgray"> {{$video->caption}}</span> </figcaption>
    </figure>
</div>
</article>