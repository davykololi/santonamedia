<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	@include('partials.head')
<body id="body">
    <div id="wrapper">
	   <div id="app">
        @include('partials.supshare')
        @include('partials.navbar')
   		   <!-- main content -->
            <main class="py-4">
                @yield('content')
            </main>
            <br/>
        @include('partials.footer')
        @include('partials.scripts')
        </div>
    </div>
</body>
</html>
