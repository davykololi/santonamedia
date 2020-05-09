<aside class="w3-sidebar w3-bar-block">
<br/>
	<div style="font-size: 15px;">
            <a class="nav-link" id="black" href="/home">HOME <span class="sr-only">(current)</span></a>
            <a class="nav-link" id="black" href="{{route('users.pages.about')}}">ABOUT US</a>
            <a class="nav-link" id="black" href="{{ route ('users.pages.contact') }}">CONTACT US</a>
            @if(!empty($categories))
    			@foreach($categories as $category)
        			<a class="nav-link" id="black" href="{{route('category.articles',['slug' => $category->slug])}}">
                        {!! strtoupper($category->name) !!}
                    </a>
    			@endforeach
			@endif
    </div>
</aside>
