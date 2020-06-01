@extends('layouts.app')
@section('title'|'Articles')

@section('content')
<div class="container-fluid features">
    <div class="row">
        @include('partials.sidebar_left_col')
        <main class="col-lg-6 col-md-6 col-sm-12 main-content"><!-- blog-main-->
            @forelse($posts as $post)
                <div class="blog-post">
                    @include('partials.post')
                        <p class="card-text">{!! Str::limit($post->content,$limit=30,$end= '...') !!}
                            <a class="btn btn-primary" href="{{ route('users.posts.read', ['post_slug' => $post->slug]) }}">
                            Read more <i class="fa fa-angle-double-right"></i>
                            </a> 
                        </p>
                        <br/><hr/>
                </div><!-- /.blog-post -->
            @empty
                <p style="color: red;font-family: Segoe UI Light;font-size: 30px"> 
                    Sorry esteemed reader. We are yet to post the <a href="#"> {{strtolower($category->name)}}</a> articles.
                </p>
            @endforelse
            <div class="ui card blogger-card fluid no-box-shadow text-center"> 
                {{ $posts->links() }}
            </div>
            @include('user.posts.tags')
            @include('user.newsletter.newsletter')
        </main> <!--end of blog-main -->
        @include('partials.sidebar_right_asidecol')
    </div><!-- end of row -->
</div> <!-- end of main -->
@endsection

