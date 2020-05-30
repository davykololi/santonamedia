<article>
<div class="dad"></div>
<div class="headings">
    <h6>SANTONA MEDIA {{ $tag->name }} {{ $post->category->name }} ARTICLE</h6>
</div>
<br/>
<h1 class="feature-title">
    <a class="post-link" href="{{ route('users.posts.read',['post_slug' => $post->slug]) }}" >{{ $post->title }}</a>
</h1>
<div class="left-ten">
    <div class="created-time">
        <a href="#"> {{ date("F j,Y,g:i a",strtotime($post->created_at)) }} By:</a>
         <span> {!! $post->admin->name !!}</span>
    </div>
    <figure>
        <img class="img-thumbnail" width="600" height="314" src = "/storage/public/storage/{{ $post->image }}" loading="lazy" alt ="{{ $post->title }}"/>
 	  <figcaption class="figcaption"> {{$post->caption}} </figcaption>
    </figure>
</div>
</article>