@extends('layouts.app')
@section('title', '| About Us')

@section('content')
    <main role="main" class="container" id="main">
        <div class="row">
            <div class="col-sm-10 blog-main" id="double" style="margin-top: 30px;margin-left: 30px">
                <br/><br/>
                <h3 class="titles"> 
                    SPECIALISTS IN WEB DESIGN AND DEVELOPMENT 
                </h3>
                <figure>                
                    <img style="border: solid gray " width ="100px" height="100px" src= "{{asset('static/david.jpg')}}" alt="Dr.David Kololi"><br/>
                    <figcaption id="firebrick"> Dr. David Kololi </figcaption>
                </figure>
                <P style="font-family:Franklin Gothic Book;font-size: 20px;"> We are the experts in Website Design and Development. We design and develop modern, state of the art websites based on the client requirements. These include E-commerce, Cooperate websites among others. To get an overview of what we do, open our <a href="{{ route ('pages.portfolio') }}"> Portfolio</a> page and see for yourselves. We are pretty sure that you will apprecite our work and you will not hestste to contact us to do a project for you. You can reach us through this link <a href="{{ route('users.pages.contact') }}">Contact Us</a> or call us on <a href="tel:+254-0724351952"><i class="fa fa-phone"></i>+254 0724351952</a>. Our clients are our bosses and we value their work so much. We will always do our best to solve world problems through software technological advancements.Thank you and you are all welcome.             
                </P>
            </div>
        </div><!-- /.row -->
        <br/>
        @include('user.newsletter.newsletter')
        <br/>
    </main><!-- /.container -->
@endsection


