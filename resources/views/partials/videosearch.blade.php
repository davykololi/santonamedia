<div style="margin-left: 60px">
<form class="form-inline my-2 my-lg-0" action="{{url('video.lists')}}" method="GET" role="search">
	{{ csrf_field() }}
	<div class="row">
		<div class="col-md-6">
			<input class="form-control mr-sm-2" type="text" id="search" style="float: left" name="search" placeholder="Search Videos" aria-label="search">
		</div>
		<div class="col-md-6">
			<button class="btn btn-info" type="submit">Search</button>
        </div>
     </div>
</form>
</div>