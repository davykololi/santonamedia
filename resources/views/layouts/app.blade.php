<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('partials.head')
<body style="background-color: brown">
    @include('partials.top')
    <div class="container">
	@include('partials.header')
    @include('partials.navbar')
    <!-- main content -->
    <main class="py-4">
        @yield('content')
    </main>
    <br/>
    @include('partials.footer')
    </div>
    @include('partials.scripts')
</body>
</html>
