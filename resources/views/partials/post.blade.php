<br/>
<article>
<h6 class="franklin">{{$post->category->name}} ARTICLE</h6>
<h2 class="blog-post-title">
    <a id="firebrick" href="{{ route('users.posts.read', ['post_slug' => $post->slug]) }}" >{{ $post->title }}</a>
</h2>
<p class="blog-post-meta">
    <div style="font-family: Calibri Light;font-size: 100%;">
        	<a style="color: maroon" href="#"> POSTED
        		{!! strtoupper($post->created_date) !!} BY 
                <span style="font-family: Arial">{!! strtoupper($post->admin->name) !!}</span>
            </a>
    </div>
</p>
<figure>
    <img style="width:40%;" src = "/storage/public/storage/{{ $post->image }}" alt ="{{ $post->slug }}"><br/>
 	<figcaption> <span id="firebrick"> {{$post->caption}}</span> </figcaption>
</figure>
</article>