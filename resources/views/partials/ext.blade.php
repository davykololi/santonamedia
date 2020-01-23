<h2 id="firebrick"> RELATED ARTICLES</h2>
@if(!empty($posts))
    @foreach($posts as $post)
        <div class="blog-post">
            @include('partials.post')
                <p class="card-text">{!! Str::limit($post->content,$limit=30,$end= '...') !!}
                <a class="btn btn-default" id="button" href="{{ route('users.posts.read', ['post_slug' => $post->slug]) }}" >Read more &rarr;</a> 
                </p>
                <br/> <br/><hr/>
        </div><!-- /.blog-post -->
    @endforeach
@endif
        <nav> 
            {{ $posts->render() }}
        </nav>