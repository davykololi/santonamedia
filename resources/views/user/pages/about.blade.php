@extends('layouts.app')
@section('title', '| About')

@section('content')
@include('partials.allnews')
<section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="contact_area">
            <h2>About Us</h2>
          	<div class="single_page_content">                
              <img class="img-center imageSpin" width="70" height="70" src="{{asset('static/ck3.jpg')}}" alt="About Us"/>
              <h3>SANTONA MEDIA GROUP LTD</h3>
                <P style="font-family:Helvetica Neue;font-size: 16px;text-align: justify;"> 
                  We are Media News Group located in Nairobi, Kenya. We pride ourselves on sharing the most captivating and engaging stories that inform, inspire and connect with readers across diverse collection of trusted local media brands. Santona Media Group is a leader in offering both local and international news and educational contents and  we remain committed in ensuring that our readers remain updated with the latest events and happening as they occur. 
                </P>
                <p style="font-family:Helvetica Neue;font-size: 16px;text-align: justify;">
                  We are also   experts in Website Design and Development. We design and develop modern, state of the artwebsites based on the client requirements. These include E-commerce, Cooperate websites among others. This website has been designed and developed by us. This is just to say "We start all he way from conceipt to deployment and and even continous configurations and maintance of your website.
                </p>
                <p style="font-family:Helvetica Neue;font-size: 16px;text-align: justify;">
                  To get an overview of what we do, open our <a style="color: blue;margin: 2px" href="{{ route ('pages.portfolio') }}"> Portfolio</a> page and see for yourselves. We are pretty sure that you will apprecite our work and you will not hestste to contact us to do a project for you. You can reach us through this link <a style="color: blue;margin: 2px" href="{{ route('users.pages.contact') }}">Contact Us</a> or call us on <a style="color: blue;margin: 2px" href="tel:+254-0724351952"><i class="fa fa-phone"></i>+254 0724351952</a>. Our clients are our bosses and we value their work so much. We will always do our best to solve world problems through software technological advancements.Thank you and you are all welcome.         
                </P>
        	   </div>
          </div>
          @include('user.posts.tags')
          @include('user.newsletter.newsletter')
          <br/><br/>
        </div>
      </div>
      @include('partials.latest_posts')
      @include('partials.aside_postextension')
    </div>
  </section>
@endsection