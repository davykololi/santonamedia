<!-- Footer -->
	<section id="footer">
		<div class="container">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Quick links</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="/home"><i class="fa fa-angle-double-right"></i>HOME</a></li>
						<li><a href="{{route('users.pages.about')}}"><i class="fa fa-angle-double-right"></i>ABOUT US</a></li>
						<li><a href="{{ route ('users.pages.contact') }}"><i class="fa fa-angle-double-right"></i>CONTACT US</a></li>
						<li><a href="{{ route ('private.policy') }}"><i class="fa fa-angle-double-right"></i>PRIVATE POLICY</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Videos</a></li>
					</ul>
				</div>

				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>CATEGORIES</h5>
					<ul class="list-unstyled quick-links">
						@if(isset($categories) && count($categories))
    						@foreach($categories as $category)
        						<li><a href="{{route('categories',['slug' => $category->slug])}}" class="fa fa-angle-double-right">{!! $category->name !!}</a>|</li>
    						@endforeach
						@endif
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Quick links</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Videos</a></li>
					</ul>
				</div>

			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
					<ul class="list-unstyled list-inline social text-center">
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-facebook"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-google-plus"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();" target="_blank"><i class="fa fa-envelope"></i></a></li>
					</ul>
				</div>
				</hr>
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<p class="h6"> Coppright &#169;{{ date('Y')}} <a class="text-green ml-2" href="https://skyluxnews.com" target="_blank">{{ config('app.name', 'skyluxnews') }} Blog. All rights reserved.</a></p>
				</div>
				</hr>
			</div>	
		</div>
	</section>
	<!-- ./Footer -->