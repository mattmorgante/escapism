<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="{!! request()->fullUrl() !!}" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta name="robots" content="index,fo2llow">
    <meta property="og:url" content="http://escapism.co/" />
    <meta property="og:site_name" content="escapism" />

    <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">
    <link rel="manifest" href="/img/manifest=====.json">
    <link rel="mask-icon" href="/img/safari-pinned-tab.svg" color="#10cf7d">
    <link rel="shortcut icon" href="/img/favicon.ico">
    <meta name="msapplication-config" content="/img/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @section('header.javascript')
    @show
</head>
<body>


@yield('content')

@if (env('APP_ENV') == 'production')
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56273136-4"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-xxxxxxx-4');
</script>
@endif
</body>
<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}"/>
</html>
