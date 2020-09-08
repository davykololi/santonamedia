@extends('layouts.app')
@section('title'|'Forbiden!')

@section('content')
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="error_page">
            <h3>We Are Sorry</h3>
            <h1>403</h1>
            <p>You are forbiden from accessing this page!</p>
            <span></span> <a href="{!! url('/') !!}" class="wow fadeInLeftBig">Go to home page</a> </div>
        </div>
      </div>
      @include('partials.aside_postextension')
    </div>
  </section>
@endsection
  