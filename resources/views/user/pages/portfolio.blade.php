@extends('layouts.app')
@section('title', '| Skyluxnews Portfolio Page')

@section('content')
    <div class="container-fluid features">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12">
                @include('partials.sidebar')
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 main-content">
                <div class="headings">
                    <h6> {{ strtoupper(config('app.name', 'skyluxnews')) }} PORTFOLIO </h6>
                </div>
                    <br/>
                    <p>This is Portifolio Page.</p>
                @include('user.posts.tags')
                @include('user.newsletter.newsletter')
            </div> <!-- end of blog-main-->
            <div class="col-lg-3 col-md-3 col-sm-12">
                @include('partials.aside_h')
            </div>
        </div><!-- /.row -->
    </div> <!-- /.container -->
@endsection


