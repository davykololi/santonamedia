<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="content-language" content="en">
    <meta name="author" content="David Misiko Kololi">
    <meta name="developer" content="David Misiko Kololi">
    <meta name="developer:email" content="kololimdavid@gmail.com">
    <meta name="designer" content="David Misiko Kololi">
    <meta name="designer:email" content="kololimdavid@gmail.com">
    <!--Webmaster Tool meta tag -->
    <meta name="google-site-verification" content="SQuydwiRzjBXoM3Dp6IU1ICGk-Z2KwDsr0kkkH4ScTM" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="fb:app_id" content="{{ config('services.facebook.client_id') }}">
    <meta name="twitter:creator" content="@santonamedia">
    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index,follow">
    <!-- Meta Tags -->
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}

    <title> @yield('title') </title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{!! asset('main/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('main/css/font-awesome.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('main/css/animate.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('main/css/font.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('main/css/li-scroller.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('main/css/slick.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('main/css/jquery.fancybox.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('main/css/theme.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('main/css/style.css') !!}">

    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    
    <!-- Styles -->
    <style>
    @import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css");
    </style>
</head>