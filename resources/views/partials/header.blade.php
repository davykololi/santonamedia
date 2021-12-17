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
            <p><i class="fa fa-clock-o"></i> {!! date('d/m/Y H:i:s') !!}</p>
            <!-- Right Side Of Navbar -->
            <ul class="top_nav">
                
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_bottom">
          <div class="logo_area">
            <a href="{{url('/')}}" class="logo">
            	<img src="{!! asset('static/logo.png') !!}" style="margin: 1px" width="40" height="40" alt="News Stadia Logo">
             	<b style="font-family: Arial Black;color: red;text-transform: uppercase;font-size: 40px">{{config('app.name')}}</b>
            </a>
          </div>
          <div class="add_banner"><a href="#"><img src="{!! asset('static/addbanner_728x90_V1.jpg') !!}" alt="news stadia banner"></a></div>
        </div>
      </div>
    </div>
  </header>