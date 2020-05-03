<div style="text-align: center;">
<div style="font-size: 12px;color: purple">We will be clad if you share this information on social media.Thank you</div>
<br/>
<span class="mg2px">
<a href="https://www.facebook.com/sharer/sharer.php?u=<URL>&t=<TITLE>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Facebook"><i class="fa fa-facebook"></i>
</a>
</span>

<span class="mg2px">
<a href="whatsapp://send?text={{ urlencode(Request::fullUrl()) }}" data-action="share/whatsapp/share" onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on whatsapp"><i class="fa fa-whatsapp"></i>
</a>
</span>

<span class="mg2px">
<a href="https://twitter.com/share?url=<URL>&text=<TITLE>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Twitter"><i class="fa fa-twitter"></i>
</a>
</span>

<span class="mg2px">
<a href="https://www.linkedin.com/shareArticle?mini=true&url=<URL>&t=<TITLE>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Linkedin"><i class="fa fa-linkedin"></i>
</a>
</span>

<span class="mg2px">
<a href="https://plus.google.com/share?url={{ urlencode(Request::fullUrl()) }}" onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Google+"><i class="fa fa-google-plus"></i>
</a>
</span>

<span class="mg2px">
<a href="http://pinterest.com/pin/create/button/?url=[EncodedURL]&media=[MEDIA]" onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Pinterest"><i class="fa fa-pinterest"></i>
</a>
</span>

<span class="mg2px">
<a href="mailto:?subject=[SUBJECT]&body={{ urlencode(Request::fullUrl()) }}" onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Mail">
</a>
</span>

<span class="mg2px">
<a href="http://www.reddit.com/submit?url=<EncodedURL>" onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Mail"><i class="fa fa-reddit"></i>
</a>
</span>
</div>

<!--facebook --button-->
<div class="fb-share-button" data-href="https://santonamedia.com/news/articles/details/" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fsantonamedia.com%2Fnews%2Farticles%2Fdetails%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>

<!-- twitter --button-->
<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-text="Yes" data-via="santonamedia" data-hashtags="santonamedia" data-related="santonamedia,santonamedia" data-show-count="false">Tweet
</a>


function crunchify_social_sharing_buttons($content) {
	global $post;
	if(is_singular() || is_home()){
	
		// Get current page URL 
		$crunchifyURL = urlencode(get_permalink());
 
		// Get current page title
		$crunchifyTitle = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
		// $crunchifyTitle = str_replace( ' ', '%20', get_the_title());
		
		// Get Post Thumbnail for pinterest
		$crunchifyThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
 
		// Construct sharing URL without using any script
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL.'&amp;via=Crunchify';
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
		$googleURL = 'https://plus.google.com/share?url='.$crunchifyURL;
		$bufferURL = 'https://bufferapp.com/add?url='.$crunchifyURL.'&amp;text='.$crunchifyTitle;
		$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$crunchifyURL.'&amp;title='.$crunchifyTitle;
 
		// Based on popular demand added Pinterest too
		$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$crunchifyURL.'&amp;media='.$crunchifyThumbnail[0].'&amp;description='.$crunchifyTitle;
 
		// Add sharing button at the end of page/page content
		$content .= '<!-- Implement your own superfast social sharing buttons without any JavaScript loading. No plugin required. Detailed steps here: https://crunchify.com/?p=7526 -->';
		$content .= '<div class="crunchify-social">';
		$content .= '<h5>SHARE ON</h5> <a class="crunchify-link crunchify-twitter" href="'. $twitterURL .'" target="_blank">Twitter</a>';
		$content .= '<a class="crunchify-link crunchify-facebook" href="'.$facebookURL.'" target="_blank">Facebook</a>';
		$content .= '<a class="crunchify-link crunchify-googleplus" href="'.$googleURL.'" target="_blank">Google+</a>';
		$content .= '<a class="crunchify-link crunchify-buffer" href="'.$bufferURL.'" target="_blank">Buffer</a>';
		$content .= '<a class="crunchify-link crunchify-linkedin" href="'.$linkedInURL.'" target="_blank">LinkedIn</a>';
		$content .= '<a class="crunchify-link crunchify-pinterest" href="'.$pinterestURL.'" data-pin-custom="true" target="_blank">Pin It</a>';
		$content .= '</div>';
		
		return $content;
	}else{
		// if not a post/page then don't include sharing button
		return $content;
	}
};
add_filter( 'the_content', 'crunchify_social_sharing_buttons');