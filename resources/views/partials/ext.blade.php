<h2 class="title" style="font-size: 20px;text-align: center;"> RECOMMENDED ARTICLES</h2>
@if(!empty($posts))
    @foreach($posts as $post)
        <div class="blog-post">
            @include('partials.post')
                <p class="card-text">{!! Str::limit($post->content,$limit=30,$end= '...') !!}
                <a class="btn btn-default" id="button" href="{{ route('users.posts.read', ['post_slug' => $post->slug]) }}" >Read more <i class="fa fa-angle-double-right"></i>
                </a> 
                </p>
                <br/> <br/><hr/>
        </div><!-- /.blog-post -->
    @endforeach
@endif
        <nav> 
            {{ $posts->render() }}
        </nav>
        @include('user.posts.tags')