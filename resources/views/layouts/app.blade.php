@include('layouts.top')
    <!-- Preloader-->
{{--    <div id="preloader">--}}
{{--        <div class="wimax-load"></div>--}}
{{--    </div>--}}
{{--    commented by yinsong--}}
@include("layouts.header")
@yield('content')
@include("layouts.footer")
@include('layouts.bottom')
