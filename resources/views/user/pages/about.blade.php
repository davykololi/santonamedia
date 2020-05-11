@extends('layouts.app')
@section('title', '| About Us')

@section('content')
    <div class="wrap">
        <div id="main-content">
            <div class="pd10">
                <h3 class="calibri">ABOUT US</h3>
                <figure>                
                    <img class="frame img-responsive" src= "{{asset('static/santonamedia.com.jpg')}}" alt="Dr.David Kololi">
                    <figcaption> SANTONA MEDIA GROUP LTD </figcaption>
                </figure>
                <P style="font-family:Helvetica Neue;font-size: 16px;text-align: justify;"> We are Media News Group located in Nairobi, Kenya. We pride ourselves on sharing the most captivating and engaging stories that inform, inspire and connect with readers across diverse collection of trusted local media brands. Santona Media Group is a leader in offering both local and international news and educational contents and  we remain committed in ensuring that our readers remain updated with the latest events and happening as they occur. We are also   experts in Website Design and Development. We design and develop modern, state of the art websites based on the client requirements. These include E-commerce, Cooperate websites among others. This website has been designed and developed by us. This is just to say "We start all he way from conceipt to deployment and and even continous configurations and maintance of your website. To get an overview of what we do, open our <a href="{{ route ('pages.portfolio') }}"> Portfolio</a> page and see for yourselves. We are pretty sure that you will apprecite our work and you will not hestste to contact us to do a project for you. You can reach us through this link <a href="{{ route('users.pages.contact') }}">Contact Us</a> or call us on <a href="tel:+254-0724351952"><i class="fa fa-phone"></i>+254 0724351952</a>. Our clients are our bosses and we value their work so much. We will always do our best to solve world problems through software technological advancements.Thank you and you are all welcome.             
                </P>
                @include('user.posts.tags')
            </div> <!--end of pd10 -->
            <div id="bottom20">
                @include('user.newsletter.newsletter')
            </div>
        </div> <!--end of main-content -->
        @include('partials.sidebars_gen')
    </div><!-- end of wrap -->
@endsection


