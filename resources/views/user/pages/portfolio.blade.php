@extends('layouts.app')
@section('title', '| Skyluxnews Portfolio Page')

@section('content')
    <div class="wrap">
        <div id="main-content">
            <div class="pd10">
                <h3 class="calibri"> {{ strtoupper(config('app.name', 'skyluxnews')) }} PORTFOLIO </h3>
                    <br/>
                    <p>This is Portifolio Page.</p>
                @include('user.posts.tags')
            </div> <!--end of pd10 -->
            <div id="bottom20">
                @include('user.newsletter.newsletter')
            </div>
        </div><!-- end of main-content -->
        @include('partials.sidebars_gen')
    </div><!--end of wrap -->
@endsection


