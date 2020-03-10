<div id="sidebar" class="navbar navbar-expand-lg">
<br/>
	<div style="font-size: 15px">
            <a class="nav-link" id="general" href="/home">HOME <span class="sr-only">(current)</span></a>
            <a class="nav-link" id="general"  href="{{route('users.pages.about')}}">ABOUT US</a>
            <a class="nav-link" id="general" href="{{ route ('users.pages.contact') }}">CONTACT US</a>
            @if(!empty($categories))
    			@foreach($categories as $category)
        			<a class="nav-link" id="general" href="{{route('categories',['slug' => $category->slug])}}">{{$category->name}}</a>
    			@endforeach
			@endif
    </div>
</div>
