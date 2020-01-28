@extends('layouts.app')
@section('title', '| Private Policy')

@section('content')
    <main role="main" class="container" id="main">
        <div class="row">
            <div class="col-sm-10 blog-main">
                <h3 style="color:purple;text-align:center"> SKYLUX BLOG PRIVATE POLICY STATEMENT</h3>
                <p>This is Private Policy Page.</p>
            </div>
        </div><!-- /.row -->
        <br/>
        @include('partials.newsletter')
        <br/>
    </main><!-- /.container -->
@endsection


