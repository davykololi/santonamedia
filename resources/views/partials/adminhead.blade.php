<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="David Misiko Kololi">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Meta Tags -->
    <meta name="robots" content="noindex,nofollow">
    <title> @yield('title') </title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <link rel="icon" href="{{asset('images/favicon.png')}}" sizes="16x16" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{!! asset('main/css/main.css') !!}" type="text/css">
    <link rel="stylesheet" type="text/css" href="{!! asset('main/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('main/css/font-awesome.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('main/css/animate.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('main/css/font.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('main/css/li-scroller.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('main/css/slick.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('main/css/jquery.fancybox.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('main/css/theme.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('main/css/style.css') !!}">
    <!--Toastr css -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    
    <!-- Styles -->
    <style>
    @import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css");
    </style>
    <style>
        #ban_margin_left{
            margin-left: 2em;
        }
    </style>
</head>