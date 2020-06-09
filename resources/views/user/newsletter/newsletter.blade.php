<hr/>
<br/>
<div class="container">
	<div class="gray">
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
					<input type="text" class="form-control" placeholder="Enter your email address here" name="email" id="email" autocorrect="off">
				</div>		
		</div>
		<div class="row">
			<div class="col-md-4"></div>
				<div class="form-group col-md-4">
					<button type="submit" class="btn btn-primary">Subscribe</button>
				</div>
		</div>
	</form><!--end of form-->
	</div>
</div>
<br/>


