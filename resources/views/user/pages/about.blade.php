@extends('layouts.app')

@section('content')
@include('partials.allnews')
<section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="contact_area">
            <h2>About Us</h2>
          	<div class="single_page_content">                
              <div id="map"></div>
              <h3>SANTONA MEDIA GROUP LTD</h3>
                <P style="font-family:Helvetica Neue;font-size: 16px;text-align: justify;"> 
                  We are Media News Group located in Nairobi, Kenya. We pride ourselves on sharing the most captivating and engaging stories that inform, inspire and connect with readers across diverse collection of trusted local media brands. Santona Media Group is a leader in offering both local and international news and educational contents and  we remain committed in ensuring that our readers remain updated with the latest events and happenings as they occur. We welcome all those who would like to advertise with us across the globe. You can <a style="color: violet;margin: 2px" href="{{ route('users.pages.contact') }}">Contact Us</a> or call us on <a style="color: violet;margin: 2px" href="tel:+254-0724351952"><i class="fa fa-phone"></i>+254 0724351952</a>. Thank you.
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