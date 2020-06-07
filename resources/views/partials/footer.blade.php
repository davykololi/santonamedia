  <footer id="footer">
    <div class="footer_top">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInLeftBig">
            <h2>Flickr Images</h2>
            <ul class="list-unstyled quick-links">
            <li><a href="/home"><i class="fa fa-angle-double-right"></i>Home</a></li>
            <li><a href="{{route('users.pages.about')}}"><i class="fa fa-angle-double-right"></i>About</a></li>
            <li><a href="{{ route ('users.pages.contact') }}"><i class="fa fa-angle-double-right"></i>Contact Us</a>
            </li>
            <li><a href="{{ route ('private.policy') }}"><i class="fa fa-angle-double-right"></i>Private Policy</a>
            </li>
            <li><a href="{{ route ('pages.portfolio') }}"><i class="fa fa-angle-double-right"></i>Portfolio</a></li>
          </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInDown">
            <h2>Tag</h2>
            <ul class="tag_nav">
            @if(isset($categories) && count($categories))
            @foreach($categories as $category)
              <li>
                <a href="{{route('category.articles',['slug' => $category->slug])}}" class="fa fa-angle-double-right">
                  {!! $category->name !!}
                </a>
              </li>
            @endforeach
            @endif
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInRightBig">
            <h2>Contact</h2>
            <address>
              <ul class="list-unstyled quick-links">
                <li><a href="#"><i class="fa fa-map-marker"></i>Nairobi,Kenya</a></li>
                <li><a href="tel:+254-0724351952"><i class="fa fa-phone"></i>+254 0724351952</a></li>
                <li><a href="mailto:santonamedia79@gmail.com"><i class="fa fa-envelope"></i>santonamedia79@gmail.com</a></li>
              </ul>
            </address>
          </div>
        </div>
      </div>
    </div>
    <div class="footer_bottom">
      <p class="copyright">Copyright &copy; {{ date('Y')}} <a href="index.html">NewsFeed</a></p>
      <p class="developer">Developed By DMK</p>
    </div>
  </footer>