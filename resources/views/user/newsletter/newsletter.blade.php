<hr/>
<div class="container" style="text-align: center;background-color: gray;width: 100%;color: white">
	<div class="col-lg-12 col-md-12 col-sm-12">
		@include('partials.messages')
     	@include('partials.errors')
	<h5>SUBSCRIBE TO OUR NEWSLETTER</h5>
	<p>Sign up here to get the latest news updates and special offers delivered directly to your inbox.</p>
	<br/>
	<form method="post" action="{{url('newsletter')}}">
        @csrf
		<div class="row">
			<div class="col-md-4"></div>
				<div class="form-group col-md-5">
					<input type="text" class="form-control" placeholder="Email Address" name="email" id="email" autocorrect="off"/>
				</div>		
		</div>
		<div class="row">
			<div class="col-md-4"></div>
				<div class="form-group col-md-4">
					<button type="submit" class="btn btn-theme">Subscribe</button>
				</div>
		</div>
	</form> <!--end of form-->
	</div>
</div>


