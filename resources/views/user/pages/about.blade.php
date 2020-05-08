@extends('layouts.app')
@section('title', '| About Us')

@section('content')
    <main role="main" class="container" id="main">
        <div class="row">
            @include('partials.sidebar')
            <div class="col-sm-6" id="content-area">
                <div class="top-15"><h3 class="calibri"> SPECIALISTS IN WEB DESIGN AND DEVELOPMENT </h3></div>
                <figure>                
                    <img width ="120px" height="120px" class="frame" src= "{{asset('static/david.jpg')}}" alt="Dr.David Kololi">
                    <figcaption> Dr. David Kololi </figcaption>
                </figure>
                <P style="font-family:Franklin Gothic Book;font-size: 20px;"> We are the experts in Website Design and Development. We design and develop modern, state of the art websites based on the client requirements. These include E-commerce, Cooperate websites among others. To get an overview of what we do, open our <a href="{{ route ('pages.portfolio') }}"> Portfolio</a> page and see for yourselves. We are pretty sure that you will apprecite our work and you will not hestste to contact us to do a project for you. You can reach us through this link <a href="{{ route('users.pages.contact') }}">Contact Us</a> or call us on <a href="tel:+254-0724351952"><i class="fa fa-phone"></i>+254 0724351952</a>. Our clients are our bosses and we value their work so much. We will always do our best to solve world problems through software technological advancements.Thank you and you are all welcome.             
                </P>
                @include('user.posts.tags')
            </div>
            @include('partials.aside_h')
        </div><!-- /.row -->
        <br/>
        @include('user.newsletter.newsletter')
        <br/>
    </main><!-- /.container -->
@endsection


