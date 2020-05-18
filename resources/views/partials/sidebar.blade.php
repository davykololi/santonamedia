<aside class="sidebar-left">
<br/>
<div>
    <a class="nav-link" href="/home">HOME <span class="sr-only">(current)</span></a>
    <a class="nav-link" href="{{route('users.pages.about')}}">ABOUT US</a>
    <a class="nav-link" href="{{ route ('users.pages.contact') }}">CONTACT US</a>
<div style="background-color: gray">
    <h3>VIDEOS SECTION</h3>
</div>
    @if(!empty($categories))
        @foreach($categories as $category)
            <a class="nav-link" href="{{route('category.videos',['slug' => $category->slug])}}">
                {!! $category->name !!}
            </a>
        @endforeach
    @endif
</div>
</aside>
