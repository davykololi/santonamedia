@extends('layouts.app')
@section('title', '| Skyluxnews Portfolio Page')

@section('content')
    <main role="main" class="container" id="main">
        <div class="row">
            @include('partials.sidebar')
            <div class="col-sm-6" id="content-area">
                <div style="margin-top: 20px">
                <h3 class="calibri"> {{ strtoupper(config('app.name', 'skyluxnews')) }} PORTFOLIO </h3>
                    <br/>
                    <p>This is Portifolio Page.</p>
                </div>
                @include('user.posts.tags')
            </div><!-- /.blog-main -->
            @include('partials.aside_h')
        </div><!-- /.row -->
        <br/>
        @include('user.newsletter.newsletter')
        <br/>
    </main><!-- /.container -->
@endsection


