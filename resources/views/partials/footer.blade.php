<footer id="footer">
    <div class="footer_top">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInLeftBig">
            <h2>Quick Links</h2>
            <ul class="tag_nav">
              <li><a href="{{url('/')}}">Home</a></li>
              <li><a href="{{route('users.pages.about')}}">About</a></li>
              <li><a href="{{ route ('users.pages.contact') }}">Contact</a></li>
              <li><a href="{{ route ('private.policy') }}">Private Policy</a></li>
              <li><a href="{{ route ('pages.portfolio') }}">Portfolio</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInDown">
            <h2>Categories</h2>
            <ul class="tag_nav">
              @if(!empty($navs))
                @foreach($navs as $category)
              <li><a href="{{route('category.articles',['slug' => $category->slug])}}">{{ $category->name }}</a></li>
                @endforeach
              @endif
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInRightBig">
            <h2>Contact</h2>
            <ul class="tag_nav">
              <li><a href="#"><i class="fa fa-map-marker"></i>Nairobi,Kenya</a></li>
              <li><a href="tel:+254-0724351952"><i class="fa fa-phone"></i>+254 0724351952</a></li>
              <li><a href="mailto:santonamedia79@gmail.com"><i class="fa fa-envelope"></i>santonamedia79@gmail.com</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="footer_bottom">
      <p class="copyright">Copyright &copy; {{ date('Y')}} 
        <span style="margin: 10px"><a href="https://santonamedia.com"> santonamedia.com </a></span> All Rights Reserved
      </p>
      <p class="developer">Developed By DMK</p>
    </div>
  </footer>