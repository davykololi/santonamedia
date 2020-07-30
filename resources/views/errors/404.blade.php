<!DOCTYPE html>
<html>
<head>
	<title>Page Not Found</title>
	<link rel="stylesheet" href="{!! asset('gencss/general.css') !!}" type="text/css">
	<style>
		#body{background-image: url('/static/mountains.jpg');background-position: center;background-repeat: no-repeat;background-size: cover;height: 100%}
	</style>
</head>
<body id="body">
	<section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="error_page">
            <h3>We Are Sorry</h3>
            <h1>404</h1>
            <p>Unfortunately, the page you were looking for could not be found. It may be temporarily unavailable, moved or no longer exists</p>
            <span></span> <a href="{{url('/')}}" class="wow fadeInLeftBig">Go to home page</a> </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
          </div>
        </aside>
      </div>
    </div>
  </section>
</body>
</html>