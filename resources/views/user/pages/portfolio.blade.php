@extends('layouts.app')
@section('title', '| Skyluxnews Portfolio Page')

@section('content')
    <main class="container features">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 main-content">
                <div class="headings">
                    <h1> {{ strtoupper(config('app.name', 'skyluxnews')) }} PORTFOLIO </h1>
                </div>
                    <br/>
                    <p>This is Portifolio Page.</p>
                @include('user.posts.tags')
                @include('user.newsletter.newsletter')
            </div> <!-- end of blog-main-->
            @include('partials.sidebar_right_hcol')
        </div><!-- /.row -->
    </main> <!-- /.container -->
@endsection


