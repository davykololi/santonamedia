@extends('layouts.app')
@section('title'| 'News')

@section('content')
<main role="main" class="container" id="main">
        <div class="row">
            <div class="col-sm-8 blog-main">
            @if(!empty($posts))
               @forelse($posts as $post)
                    <div class="blog-post">
                        @include('partials.post')
                        <p class="card-text">{!! Str::limit($post->content,$limit=30,$end= '...') !!}
                            <a class="btn btn" id="button" href="{{ route('users.posts.read', ['post_slug' => $post->slug]) }}" >Read more &rarr;</a> 
                        </p>
                        <br/> <br/><hr/>
                    </div><!-- /.blog-post -->
                @empty
                <p style="color: red;font-family: Segoe UI Light;font-size: 30px"> Sorry esteemed reader. We are yet to post <a href="#"> {{ config('app.name', 'skyluxnews') }} Blog </a> articles</p>
                @endforelse
            @endif
                <nav class="blog-pagination">
                    {{ $posts->render() }}
                </nav>
            </div><!-- /.blog-main -->
<aside class="col-sm-3 ml-sm-auto blog-sidebar" id="aside">
    <div class="sidebar-module">
        <br/>
        <h4 class="franklin">LATEST ARTICLES </h4>
            @forelse($archives as $archive)
                <ol class="list-unstyled">
                    <li>
                        <a id="firebrick" href="{{ route('users.posts.read', ['post_slug' => $archive->slug]) }}">{!! \Illuminate\Support\Str::words($archive->title, 6, '...') !!}
                        </a>
                    </li>
                </ol>
            @empty
            <p style="color: red">None</p>
            @endforelse
    </div>
    <div class="sidebar-module">
        <br/>
        <h4 class="franklin">CATEGORIES </h4>
        @if(!empty($categories))
            @foreach($categories as $category)
                <a class="nav-link" id="firebrick" href="{{route('categories',['slug' => $category->slug])}}">{{$category->name}}</a>
            @endforeach
        @endif
    </div>

    <div class="sidebar-module">
        <br/>
        <h4 class="franklin">POPULAR POSTS </h4>
        @include('user.posts.popular')
    </div>

    <div class="sidebar-module">
        <br/>
        <h4 class="franklin">LAST 7 DAYS ARTICLES </h4>
        @include('user.posts.week')
    </div>
</aside><!-- /.blog-sidebar -->
    </div><!-- /.row -->
</main><!-- /.container -->       

    
@endsection
