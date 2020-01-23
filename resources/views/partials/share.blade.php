<h5 style="font-family: Comic Sans MS">Share on: </h5>
{!! Share::currentPage()->facebook(); !!}
{!! Share::currentPage()->twitter(); !!}
{!! Share::currentPage()->linkedin(); !!}
{!! Share::currentPage()->whatsapp(); !!}
{!! Share::currentPage()->reddit(); !!}
{!! Share::currentPage()->telegram(); !!}
{!! Share::currentPage()->pinterest(); !!}

<ul class="social-buttons">
	<li>
	<a href="https://plus.google.com/share?url={{ urlencode(Request::fullUrl()) }}"
       target="_blank" rel="nofollow" id="share"> 
           <i class="fa fa-google-plus-square"></i>
     </a>
 	</li>
</ul>

