<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('partials.head')
<body id="body">
    <div class="container" id="container">
       <div id="app">
        @include('partials.supshare')
        @include('partials.navbar')
           <!-- main content -->
            <main class="py-4">
                @yield('content')
            </main>
            <br/>
        @include('partials.scripts')
        </div> <!-- end of id app -->
    </div> <!-- end of container-fluid -->
    @include('partials.footer')
</body>
</html>