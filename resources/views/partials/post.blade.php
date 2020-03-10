<br/>
<article>
<h6 class="calibri">{{$post->category->name}} ARTICLE</h6>
<br/>
<h2 class="blog-post-title">
    <a class="title" href="{{ route('users.posts.read', ['post_slug' => $post->slug]) }}" >{{ $post->title }}</a>
</h2>
<p class="blog-post-meta">
    <div style="font-family: Calibri Light;font-size: 100%;">
        	<a style="color: black" href="#"> 
        		<span style="font-size: 13px">
                	<strong>Published On: </strong> {{ date("F j,Y,g:i a",strtotime($post->created_at)) }}
            	</span>
        		 by 
                <span class="title" style="color: blue;">{!! $post->admin->name !!}</span>
            </a>
    </div>
</p>
<figure>
    <img style="width:40%;border: solid gray" src = "/storage/public/storage/{{ $post->image }}" alt ="{{ $post->title }}"><br/>
 	<figcaption> <span id="dimgray"> {{$post->caption}}</span> </figcaption>
</figure>
</article>