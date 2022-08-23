<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{-- start top.php--}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="description" content="{{(Helper::get_option('website_desc', '#1 Marketing Platform for Social Network') )}}">
    <meta name="keywords" content="{{Helper::get_option('website_keywords', 'social network, marketing, brands, businesses, agencies, individuals') }}">
    <!-- Favicon-->
    <link rel="icon" type="image/png" href="{{asset("themes/backend/default/assets/img/favicon12.png")}}" />
    <!-- Stylesheet-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('themes/frontend/wimax/assets/fonts/flags/flag-icon.css')}}">
    <link rel="stylesheet" href="{{ asset('themes/frontend/wimax/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('themes/frontend/wimax/assets/css/header.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset("plugins/slick.css")}}" />

    @yield('specific_css')

    <script type="text/javascript">
        var token = '{{csrf_token()}}',
            PATH  = '{{__(str_replace("http://", "https://", url("")))}}';
    </script>
    {{ htmlspecialchars_decode(Helper::get_option('embed_code', ''), ENT_QUOTES)}}
    <meta name="google-site-verification" content="CemsoY87oWl-tvUPug3f58m5po8QzQiDyMxfwEBe6Rs" />
    {{--    end top.php--}}
</head>
<body>
