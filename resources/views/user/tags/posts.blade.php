@extends('layouts.app')
@section('title'|'Articles')

@section('content')
<main class="container features">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 main-content"><!-- blog-main-->
               @forelse($posts as $post)
                    <div class="blog-post">
                        @include('partials.tagpost')
                        <p class="card-text">{!! Str::limit($post->content,$limit=30,$end= '...') !!}
                            <a class="btn btn-primary" href="{{ route('users.posts.read', ['post_slug' => $post->slug]) }}" >
                            Read more <i class="fa fa-angle-double-right"></i>
                            </a> 
                        </p>
                        <hr/>
                    </div><!-- /.blog-post -->
                @empty
                <p style="color: red;font-family: Segoe UI Light;font-size: 30px"> 
                    Sorry esteemed reader. We are yet to post the <a href="#"> {{$tag->name}}</a> articles.
                </p>
                @endforelse
                <div class="ui card blogger-card fluid no-box-shadow text-center"> 
                    {{ $posts->render() }}
                </div>
                @include('user.posts.tags')
                @include('user.newsletter.newsletter')
        </div> <!--end of blog-main -->
        <aside class="col-lg-4 col-md-4 col-sm-4">
            @include('partials.posttag_aside')
        </aside>
    </div><!--end of row -->
</main> <!--end of main -->
@endsection

