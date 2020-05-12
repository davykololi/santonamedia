@extends('layouts.app')
@section('title', '| Skyluxnews Portfolio Page')

@section('content')
    <main role="main" class="container-fluid" id="margtop60">
        <div class="row" id="dispflex">
            <div class="col-sm-3">
                @include('partials.sidebar')
            </div>
            <div class="blog-main col-sm-6" id="main-content">
                <div id="headings">
                    <h3 class="calibri"> {{ strtoupper(config('app.name', 'skyluxnews')) }} PORTFOLIO </h3>
                </div>
                    <br/>
                    <p>This is Portifolio Page.</p>
                @include('user.posts.tags')
                @include('user.newsletter.newsletter')
            </div> <!-- end of blog-main-->
            <div class="col-sm-3">
                @include('partials.aside_h')
            </div>
        </div><!-- /.row -->
    </main><!-- /.container -->
@endsection


