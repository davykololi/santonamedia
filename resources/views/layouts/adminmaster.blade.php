<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	@include('partials.head')
<body>
    <div id="app">
       @include('partials.adminheader')
        <main class="py-4">
            @yield('content')
        </main>
        @include('partials.footer')
        @include('partials.scripts')
    </div>
</body>
</html>
