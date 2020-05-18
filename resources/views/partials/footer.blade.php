<!-- Footer -->
<footer class="page-footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12">
				<h5>Quick links</h5>
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
			<div class="col-lg-3 col-md-3 col-sm-12">
				<h5>Categories</h5>
				<ul class="list-unstyled quick-links">
				@if(isset($categories) && count($categories))
    				@foreach($categories as $category)
        			<li>
        				<a href="{{route('category.articles',['slug' => $category->slug])}}" class="fa fa-angle-double-right">{!! $category->name !!}
        				</a>
        			</li>
    				@endforeach
				@endif
				</ul>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12">
				<h5>Contacts</h5>
				<ul class="list-unstyled quick-links">
					<li><a href="#"><i class="fa fa-map-marker"></i>Nairobi,Kenya</a></li>
					<li><a href="tel:+254-0724351952"><i class="fa fa-phone"></i>+254 0724351952</a></li>
					<li><a href="mailto:santonamedia79@gmail.com"><i class="fa fa-envelope"></i>santonamedia79@gmail.com</a>
					</li>
				</ul>
				<h5>Follow Us On</h5>
				<ul class="list-unstyled quick-links">
					<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-facebook"></i></a></li>
					<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-twitter"></i></a></li>
					<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-instagram"></i></a></li>
					<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-google-plus"></i></a></li>
					<li class="list-inline-item"><a href="javascript:void();" target="_blank"><i class="fa fa-envelope"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="footer-copyright text-center">
		<p class="h6"> COPYRIGHT &#169;{{ date('Y')}} 
			<a class="text-green ml-2" href="http://santonamedia.com" target="_blank">{{ strtoupper(config('app.name', 'santonamedia')) }} HOUSE. ALL RIGHTS RESERVED.
			</a>
		</p>		
	<div>	
</footer>
<!-- ./Footer -->