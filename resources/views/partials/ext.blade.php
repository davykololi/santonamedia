<div class="box">RECOMMENDED ARTICLES</div>
@if(!empty($posts))
    @foreach($posts as $post)
        <div class="blog-post">
            @include('partials.postext')
                <p class="card-text">{!! Str::limit($post->content,$limit=30,$end= '...') !!}
                    <a class="btn btn-primary" href="{{ route('users.posts.read',['post_slug' => $post->slug]) }}" >
                        Read more <i class="fa fa-angle-double-right"></i>
                    </a> 
                </p>
                <br/><br/><hr/>
        </div><!-- /.blog-post -->
    @endforeach
@endif
        <nav> 
            {{ $posts->render() }}
        </nav>