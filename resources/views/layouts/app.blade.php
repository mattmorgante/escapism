<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="{!! request()->fullUrl() !!}" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta name="robots" content="index,follow">
    <meta property="og:url" content="https://escape-today.herokuapp.com/" />
    <meta property="og:site_name" content="escapism" />
    <meta name="msapplication-config" content="/img/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Escapism - Find your next favorite destination</title>
    <meta name="description" content="Escapism is a collection of beautiful and inspiring destinations around the world
     to plan your
next vacation. Come find something awesome!"/>
    <meta property="og:title" content="Escapism | Find your next favorite destination" />
    <meta property="og:description" content="A collection of beautiful and inspiring destinations around the world to plan your
next vacation"/>

    @if (env('APP_ENV') == 'production')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56273136-5"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-56273136-5');
    </script>
    @endif

</head>
<body>
    @yield('content')

</body>

@if (env('APP_ENV') == 'production')
    <link rel="stylesheet" type="text/css" href="https://escape-today.herokuapp.com/css/app.css"/>
@else
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}"/>
@endif
</html>
