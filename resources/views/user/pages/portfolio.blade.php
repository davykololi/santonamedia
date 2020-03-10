@extends('layouts.app')
@section('title', '| Skyluxnews Portfolio Page')

@section('content')
    <main role="main" class="container" id="main">
        <div class="row">
            <div class="col-sm-12 blog-main">
                <br/>
                <h3 class="titles"> 
                    {{ strtoupper(config('app.name', 'skyluxnews')) }} PORTFOLIO 
                </h3>
                <p>This is Portifolio Page.</p>
            </div>
        </div><!-- /.row -->
        <br/>
        @include('partials.newsletter')
        <br/>
    </main><!-- /.container -->
@endsection


