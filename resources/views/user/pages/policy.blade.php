@extends('layouts.app')
@section('title', '| Private Policy')

@section('content')
    <main role="main" class="container" id="main">
        <div class="row">
            <div class="col-sm-12 blog-main">
                <br/>
                <h3 class="titles"> 
                    {{ strtoupper(config('app.name', 'skyluxnews')) }} PRIVATE POLICY STATEMENT
                </h3>
                <p>This is Private Policy Page.</p>
            </div>
        </div><!-- /.row -->
        <br/>
        @include('user.newsletter.newsletter')
        <br/>
    </main><!-- /.container -->
@endsection


