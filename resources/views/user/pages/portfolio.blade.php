@extends('layouts.app')

@section('content')
@include('partials.allnews')
<section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="contact_area">
            <h2>Portfolio</h2>
              <div class="single_page_content">
                <p>Hi All</p>
              </div>
          </div>
        </div>
      </div>
      @include('partials.latest_posts')
      @include('partials.aside_postextension')
    </div>
</section>
@endsection



