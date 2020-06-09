<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="{{ asset('js/fontawesome.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled Javascript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<!--Facebook POST share button script-->
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0&appId=478558799561221&autoLogAppEvents=1"></script>

<!--Twitter share button script-->
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

<!--CDNNJS CDN script-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jsonld/3.1.1/jsonld.min.js"></script>

<!-- Default Statcounter code for Santona Media https://santonamedia.com -->
<script type="text/javascript">
var sc_project=12328161; 
var sc_invisible=0; 
var sc_security="28a1d34d"; 
var sc_https=1; 
var scJsHost = "https://";
document.write("<sc"+"ript type='text/javascript' src='" + scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>
<noscript><div class="statcounter"><a title="Web Analytics"
href="https://statcounter.com/" target="_blank"><img class="statcounter"
src="https://c.statcounter.com/12328161/0/28a1d34d/0/" alt="Web
Analytics"></a></div></noscript>
<!-- End of Statcounter Code -->


<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KVS6TJV');</script>
<!-- End Google Tag Manager -->

<script>
var slideIndex = 0;
carousel();

function carousel(){
	var i;
	var x = document.getElementsByClassName("mySlides");
	for(i = 0; i < x.length; i++){
		x[i].style.display = "none";
	}
	slideIndex++;
	if (slideIndex > x.length){
		slideIndex = 1
	}
	x[slideIndex-1].style.display = "block";
	setTimeout(carousel, 2000);// Change image every 2 seconds
}
</script>