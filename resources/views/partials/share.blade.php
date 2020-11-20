<div class="social_link">
    <div style="font-size: 16px;text-align: center;"><strong>Share This Article:</strong></div>
    <ul class="sociallink_nav">
        <li>
        	<a href="https://www.facebook.com/sharer/sharer.php?u=&t=" title="Share on Facebook" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;"><i class="fa fa-facebook"></i>
        	</a>
        </li>
        <li>
        	<a href="https://twitter.com/share?url={{ urlencode(Request::fullUrl()) }}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" 
        		target="_blank" title="Share on Twitter"><i class="fa fa-twitter"></i>
        	</a>
        </li>
        <li>
        	<a href="https://plus.google.com/share?url={{ urlencode(Request::fullUrl()) }}" onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Google+"><i class="fa fa-google-plus"></i>
        	</a>
        </li>
        <li>
        	<a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(Request::fullUrl()) }}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Linkedin"><i class="fa fa-linkedin"></i>
        	</a>
        </li>
        <li>
        	<a href="http://pinterest.com/pin/create/button/?url={{ urlencode(Request::fullUrl()) }}" onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Pinterest"><i class="fa fa-pinterest"></i>
        	</a>
        </li>
    </ul>
</div>