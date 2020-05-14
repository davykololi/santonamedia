<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="David Misiko Kololi">
    <!--Webmaster Tool meta tag -->
    <meta name="google-site-verification" content="SQuydwiRzjBXoM3Dp6IU1ICGk-Z2KwDsr0kkkH4ScTM" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Meta Tags -->
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}

    <title> @yield('title') </title>
    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/5.11.2/css/font-awesome.min.css">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
    <link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}" type="text/css">
    <link rel="stylesheet" href="{!! asset('css/footer.css') !!}" type="text/css">
    <link rel="stylesheet" href="{!! asset('gencss/fontawesome.css') !!}" type="text/css">
    <link rel="stylesheet" href="{!! asset('gencss/fontawesome.min.css') !!}" type="text/css">
    <link rel="stylesheet" href="{!! asset('gencss/general.css') !!}" type="text/css">
</head>