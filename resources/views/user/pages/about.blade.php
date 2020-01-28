@extends('layouts.app')
@section('title', '| About Us')

@section('content')
    <main role="main" class="container" id="main">
        <div class="row">
            <div class="col-sm-10 blog-main">
                <br/><br/>
                <P style="color:white;font-size: 15px; font-family:PERPETUA TITLING MT;text-align:center"> SPECIALISTS IN WEB DESIGN AND DEVELOPMENT </P>
                <figure>                
                    <img style="border: solid gray " width ="100px" height="100px" src= "{{asset('static/david.jpg')}}" alt="Dr.David Kololi"><br/>
                    <figcaption> Dr. David Kololi </figcaption>
                </figure>
                <P style="font-family:Franklin Gothic Book;"> We are the experts in Website Design and Development. We design and develop modern, state of the art websites based on the client requirements. These include E-commerce, Cooperate websites among others. To get an overview of what we do, open our portfolio page and see for yourselves. We are pretty sure that you will apprecite our work and you will not hestste to contact us to do a project for you. You can reach us through this link <a href="{{ route('users.pages.contact') }}">CONTACT US</a> or call us on 254724351952. Our clients are our bosses and we value their work so much. We will always do our best to solve world problems through software technological advancements.Thank you and you are all welcome.             
                </P>
            </div>
        </div><!-- /.row -->
        <br/>
        @include('partials.newsletter')
        <br/>
    </main><!-- /.container -->
@endsection


