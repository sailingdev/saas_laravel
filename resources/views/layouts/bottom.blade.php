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
</html>
