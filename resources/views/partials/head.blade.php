<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="content-language" content="en">
    <meta name="author" content="David Misiko Kololi">
    <meta name="developer" content="David Misiko Kololi">
    <meta name="developer:email" content="kololimdavid@gmail.com">
    <meta name="designer" content="Themeforest Template">
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
    <!-- rss feed -->
    @include('feed::links')
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
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
    <style>
        @keyframes spin{
    from{
        transform: rotateY(0deg);
        moz-transform:rotateY(0deg); //Firefox
        ms-transform:rotateY(0deg); //Microsoft Browsers
    }
    to{
        transform: rotateY(360deg);
        moz-transform: rotateY(360deg); //Firefox
        ms-transform: rotateY(360deg); //Microsoft Browsers
    }
}

@-webkit-keyframes spin{
    from{-webkit-transform: rotateY(0deg);}
    to{-webkit-transform: rotateY(360deg);}
}

.imageSpin{
    animation-name:spin;
    animation-timing-function: linear;
    animation-iteration-count: infinite;
    animation-duration: 5s;
    -webkit-animation-name:spin;
    -webkit-animation-timing-function: linear;
    -webkit-animation-iteration-count: infinite;
    -webkit-animation-duration: 5s;
}
    </style>
<style>
    .summary{padding: 4px;width: 100%; background-color: #eeeeee;border: none;box-shadow: 1px 1px 2px #bbbbbb}
    .post-caption{display: block;text-align: center;font-size: 16px;color: gray;margin-bottom: 20px;margin-top: -10px}
    .author-img{width: 5%;margin: 10px;border-radius: 50%}
    .video-caption{color: gray;font-size: 16px;padding: 5px;margin-bottom: 15px}
</style>
<style type="text/css">
    #map{
        width: 100%;
        height: 500px;
        border:2px solid black;
    }
</style>
<!--Search css -->
<style>
    .search_results{margin: 5px; color: violet}
</style>
</head>