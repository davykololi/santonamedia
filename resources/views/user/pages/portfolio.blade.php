@extends('layouts.app')
@section('title', '| Skyluxnews Portfolio Page')

@section('content')
    <div class="container-fluid features">
        <div class="row">
            @include('partials.sidebar_left_col')
            <main class="col-lg-6 col-md-6 col-sm-12 main-content">
                <div class="headings">
                    <h1> {{ strtoupper(config('app.name', 'skyluxnews')) }} PORTFOLIO </h1>
                </div>
                    <br/>
                    <p>This is Portifolio Page.</p>
                @include('user.posts.tags')
                @include('user.newsletter.newsletter')
            </main> <!-- end of blog-main-->
            @include('partials.sidebar_right_hcol')
        </div><!-- /.row -->
    </div> <!-- /.container -->
@endsection


