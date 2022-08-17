<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{-- start top.php--}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="description" content="{{Helper::get_option('website_desc', '#1 Marketing Platform for Social Network')}}">
    <meta name="keywords" content="{{Helper::get_option('website_keywords', 'social network, marketing, brands, businesses, agencies, individuals')}}">
    <link rel="icon" type="image/png" href="{{Helper::get_option('website_favicon', asset("themes/backend/default/assets/img/favicon.png")}}" />

    <!--Css-->
    <link rel="stylesheet" type="text/css" href="{{asset('themes/backend/default/assets/fonts/line/line-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('themes/backend/default/assets/fonts/feather/feather.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('themes/backend/default/assets/fonts/awesome/awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('themes/backend/default/assets/fonts/flags/flag-icon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('themes/backend/default/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('themes/backend/default/assets/plugins/jquery-ui/jquery-ui.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('themes/backend/default/assets/plugins/datetimepicker/jquery-ui-timepicker-addon.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('themes/backend/default/assets/plugins/chartjs/chart.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('themes/backend/default/assets/plugins/fancybox/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('themes/backend/default/assets/plugins/izitoast/css/izitoast.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('themes/backend/default/assets/plugins/emojionearea/emojionearea.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('themes/backend/default/assets/plugins/custom-scrollbar/custom-scrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('themes/backend/default/assets/plugins/monthly/monthly.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('themes/backend/default/assets/plugins/ion.rangeslider/ion.rangeSlider.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('themes/backend/default/assets/plugins/owl-carousel/css/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('themes/backend/default/assets/plugins/vtdropdown/vtdropdown.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('themes/backend/default/assets/plugins/select/css/bootstrap-select.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('themes/backend/default/assets/css/style.css')}}">

    <?php _e( load_files('css') );?>

        <!--Jquery-->
    <script type="text/javascript" src="{{asset('themes/backend/default/assets/plugins/jquery/jquery.min.js')}}"></script>
    <!---End Jquery-->
    <script type="text/javascript">
        var token = '{{csrf_token()}}';
        var PATH  = '<?php _e(PATH)?>';
        var BASE  = '<?php _e(BASE)?>';
        var FORMAT_DATE = '<?php _e( date_show_js() ) ?>';
        var FORMAT_DATETIME = <?php _e( datetime_show_js() )?>;
        var LANGUAGE = '<?php _e( get_lang_file() )?>';

        <?php if( _p('file_manager_enable') && _p('file_manager_google_drive') && get_option('file_manager_google_drive_status', 0) == 1){?>
        var FILE_MANAGER_GOOGLE_API_KEY = '<?php _e( get_option('file_manager_google_api_key', '') )?>';
        var FILE_MANAGER_GOOGLE_CLIENT_ID = '<?php _e( get_option('file_manager_google_client_id', '') )?>';
        <?php }?>

        <?php if( _p('file_manager_enable') && _p('file_manager_onedrive') && get_option('file_manager_onedrive_status', 0) == 1){?>
        var FILE_MANAGER_ONEDRIVE_API_KEY = '<?php _e( get_option('file_manager_onedrive_api_key', '') )?>';
        <?php }?>
            document.onreadystatechange = function () {
            var state = document.readyState
            if (state == 'complete') {
                setTimeout(function(){
                    document.getElementById('interactive');
                    document.getElementById('loading-overplay').style.opacity ="0";
                },500);

                setTimeout(function(){
                    document.getElementById('loading-overplay').style.display ="none";
                    document.getElementById('loading-overplay').style.opacity ="1";
                },1000);
            }
        }
    </script>

    <?php if(get_option('beamer_status', 0) && get_option('beamer_product_id', '') != ""){?>
    <script>
        var beamer_config = {
            product_id : "<?php _e( get_option('beamer_product_id', '') )?>"
        };
    </script>
    <script type="text/javascript" src="https://app.getbeamer.com/js/beamer-embed.js" defer="defer"></script>
    <?php }?>

    <?php _e( htmlspecialchars_decode(get_option('embed_code', ''), ENT_QUOTES) , false)?>
</head>
<body>




</body>
</html>
