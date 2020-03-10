<hr/>
<div class="container" style="background-color: grey; border-radius:4px; width:50%; height:50%;padding-top:1%;">
		@include('partials.messages')
     	@include('partials.errors')
	<h5 class="center" style="color: white;">SUBSCRIBE TO OUR NEWSLETTER</h5>
	<div id="cwhite" style="text-align: center">
	Sign up here to get the latest news updates and special offers delivered directly to your inbox.
	</div>
	<br/>
<form method="post" action="{{url('newsletter')}}">
        @csrf
	<div class="row">
		<div class="col-md-4"></div>
			<div class="form-group col-md-5">
				<input type="text" class="form-control" placeholder="Enter your email address here" name="email" id="email">
			</div>		
	</div>
	<div class="row">
		<div class="col-md-4"></div>
			<div class="form-group col-md-4">
				<button type="submit" class="btn btn-default" id="button">Subscribe</button>
			</div>
	</div>
</form><!--end of form-->
</div>


