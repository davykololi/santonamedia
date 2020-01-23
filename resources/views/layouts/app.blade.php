<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	@include('partials.head')
<body class="body">
	<div id="app">
    	@include('partials.header')
        @include('partials.top')
   		<!-- main content -->
        <main class="py-4">
            @yield('content')
        </main>
        @include('partials.newsletter')
        <br/>
        @include('partials.footer')
        @include('partials.scripts')
    </div>
</body>
</html>
