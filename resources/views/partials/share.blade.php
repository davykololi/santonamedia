<br/>
<span style="font-family: Comic Sans MS;font-size: 12px"> <strong>Share on: </strong> </span>
<span class="margin5">{!! Share::currentPage()->facebook(); !!}</span>
<span class="margin5">{!! Share::currentPage()->twitter(); !!}</span>
<span class="margin5">{!! Share::currentPage()->linkedin(); !!}</span>
<span class="margin5">{!! Share::currentPage()->whatsapp(); !!}</span>
<span class="margin5">{!! Share::currentPage()->pinterest(); !!}</span>
<span class="margin5">{!! Share::currentPage()->reddit(); !!}</span>
<span class="margin5">{!! Share::currentPage()->telegram(); !!}</span>
	<a href="https://plus.google.com/share?url={{ urlencode(Request::fullUrl()) }}"
       target="_blank" rel="nofollow" class="social-button"> 
           <span class="fa fa-google-plus-square fa-2x fa-spin" aria-hidden="true"></span>
    </a>
<br/><br/>

