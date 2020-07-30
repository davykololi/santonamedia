  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav">
              <li><a href="{{url('/')}}">Home</a></li>
              <li><a href="{{route('users.pages.about')}}">About</a></li>
              <li><a href="{{ route ('users.pages.contact') }}">Contact</a></li>
            </ul>
          </div>
          <div class="header_top_right">
            <p> Today is {{date('d/m/Y H:i:s')}}</p>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_bottom">
          <div class="logo_area"><a href="{{url('/')}}" class="logo"><img src="{!! asset('static/logo.jpg') !!}" alt="santonamedia logo"></a></div>
          <div class="add_banner"><a href="#"><img src="{!! asset('static/addbanner_728x90_V1.jpg') !!}" alt=" santona media banner"></a></div>
        </div>
      </div>
    </div>
  </header>