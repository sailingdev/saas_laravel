<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{-- start top.php--}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="description" content="{{(Helper::get_option('website_desc22', '#1 Marketing Platform for Social Network') )}}">
    <meta name="keywords" content="__( Helper::get_option('website_keywords', 'social network, marketing, brands, businesses, agencies, individuals') )">
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

    <!-- Preloader-->
{{--    <div id="preloader">--}}
{{--        <div class="wimax-load"></div>--}}
{{--    </div>--}}
{{--    commented by yinsong--}}
@include("layouts.header")
@yield('content')
@include("layouts.footer")
</body>

<?php if(Helper::get_option('google_recaptcha_status', 0)){?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php }?>

    <!-- jQuery(necessary for all JavaScript plugins)-->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="{{asset('themes/frontend/wimax/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('themes/frontend/wimax/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('themes/frontend/wimax/assets/js/waypoints.min.js')}}"></script>
<script src="{{asset('themes/frontend/wimax/assets/js/jquery.easing.min.js')}}"></script>
<script src="{{asset('themes/frontend/wimax/assets/js/default/classy-nav.min.js')}}"></script>
<script src="{{asset('themes/frontend/wimax/assets/js/default/sticky.js')}}"></script>
<script src="{{asset('themes/frontend/wimax/assets/js/default/one-page-nav.js')}}"></script>
<script src="{{asset('themes/frontend/wimax/assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('themes/frontend/wimax/assets/js/default/scrollup.min.js')}}"></script>
<script src="{{asset('themes/frontend/wimax/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('themes/frontend/wimax/assets/js/jarallax.min.js')}}"></script>
<script src="{{asset('themes/frontend/wimax/assets/js/jarallax-video.min.js')}}"></script>
<script src="{{asset('themes/frontend/wimax/assets/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('themes/frontend/wimax/assets/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('themes/frontend/wimax/assets/js/wow.min.js')}}"></script>
<script src="{{asset('themes/frontend/wimax/assets/js/default/mail.js')}}"></script>
<script src="{{asset('themes/frontend/wimax/assets/js/wimax.js')}}"></script>
<!-- All plugins activation code-->
<script src="{{asset('themes/frontend/wimax/assets/js/default/active.js')}}"></script>

@yield('specific_js')

<script type="text/javascript" src="{{asset("plugins/slick.js")}}"></script>


<script>
    AOS.init({
        easing: 'ease-out-back',
        duration: 2000
    });
</script>

</html>
