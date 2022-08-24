<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{-- start top.php--}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="description" content="{{Helper::get_option('website_desc', '#1 Marketing Platform for Social Network')}}">
    <meta name="keywords" content="{{Helper::get_option('website_keywords', 'social network, marketing, brands, businesses, agencies, individuals')}}">
    <link rel="icon" type="image/png" href="{{asset('themes/backend/default/assets/img/favicon12.png')}}" />

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
    <link rel="stylesheet" type="text/css" href="{{asset('themes/backend/default/assets/css/reset.css')}}">
    <link rel='stylesheet' type='text/css' href='{{asset('system/account_manager/assets/css/account_manager.css')}}'>
    <link rel='stylesheet' type='text/css' href='{{asset('system/caption/assets/css/caption.css')}}'>
    <link rel='stylesheet' type='text/css' href='{{asset('system/file_manager/assets/plugins/file.upload/css/jquery.fileupload.css')}}'>
    <link rel='stylesheet' type='text/css' href='{{asset('system/file_manager/assets/css/file_manager.css')}}'>
    <link rel='stylesheet' type='text/css' href='{{asset('system/group_manager/assets/css/group_manager.css')}}'>
    <link rel='stylesheet' type='text/css' href='{{asset('system/schedules/assets/css/schedules.css')}}'>
    <link rel='stylesheet' type='text/css' href='{{asset('system/user_manager/assets/css/user_manager.css')}}'>
    <link rel='stylesheet' type='text/css' href='{{asset('system/watermark/assets/css/watermark.css')}}'>
    <link rel='stylesheet' type='text/css' href='{{asset('public/facebook_post/assets/css/facebook_post.css')}}'>
    <link rel='stylesheet' type='text/css' href='{{asset('public/instagram_post/assets/css/instagram_post.css')}}'>
    <link rel='stylesheet' type='text/css' href='{{asset('public/post/assets/css/post.css')}}'>
    <link rel='stylesheet' type='text/css' href='{{asset('public/twitter_post/assets/css/twitter_post.css')}}'>

    @yield('specific_css')

    <!--Jquery-->
    <script type="text/javascript" src="{{asset('themes/backend/default/assets/plugins/jquery/jquery.min.js')}}"></script>
    <!---End Jquery-->
    <script type="text/javascript">
        var token = '{{csrf_token()}}';
        var PATH  = '{{asset('')}}';
        var BASE  = '{{asset('')}}';
        var FORMAT_DATE = '{{Helper::date_show_js()}}';
        var FORMAT_DATETIME = '{{Helper::datetime_show_js()}}';
        var LANGUAGE = '';
        var FILE_MANAGER_GOOGLE_API_KEY = 'AIzaSyC_ROwjrDpzSde2zwiQEFd_Y3U9Gmo6x6I';
        var FILE_MANAGER_GOOGLE_CLIENT_ID = '759264117371-e8r10bf8s0sl188fcn5e7etfiiig4ff4.apps.googleusercontent.com';
        var FILE_MANAGER_ONEDRIVE_API_KEY = '6c514944-11bd-4be1-aa05-fd6f94a78361';
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
    @if(Helper::get_option('beamer_status', 0) && Helper::get_option('beamer_product_id', '') != "")
    <script>
        var beamer_config = {
            product_id : "{{Helper::get_option('beamer_product_id', '')}}"
        };
    </script>
    <script type="text/javascript" src="https://app.getbeamer.com/js/beamer-embed.js" defer="defer"></script>
    @endif
    {!! htmlspecialchars_decode(Helper::get_option('embed_code', ''), ENT_QUOTES) !!}
</head>
<body class='{{Helper::get_option('appearance_default_menu', 0)?"":"sidebar-small"}}' id="{{Helper::get_option('appearance_menu_color', "light")}}">

<div class="loading-overplay" id="loading-overplay">
    <div class='loader loader1'>
        <div>
            <div>
                <div>
                    <div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="header">
    <div class="topbar">
        <div class="m-t-10 d-none d-sm-block">
            <span class="m-r-10">Subscription expire: 29-08-2022</span>
        </div>
        <div class="m-r-10 m-t-2 d-none d-sm-block">
            <a href="{{url('pricing')}}" class="btn btn-info text-uppercase">Upgrade now</a>
        </div>
        <div class="item item-none-with item-user">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Hi, {{Auth::user()->fullname}} <img src="https://ui-avatars.com/api/?name=Testing&amp;background=5578eb&amp;color=fff&amp;font-size=0.5&amp;rounded=true">
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-fit dropdown-menu-anim dropdown-menu-top-unround" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="http://localhost/202287/laravel/public/profile">
                        <i class="far fa-user"></i> Account
                    </a>

                    <a class="dropdown-item" href="http://localhost/202287/laravel/public/profile/index/change_password"><i class="fas fa-unlock-alt"></i> Change password</a>
                    <a class="dropdown-item" href="http://localhost/202287/laravel/public/profile/index/package"><i class="fas fa-cubes"></i> Package</a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="sidebar">
    <a href="javascript:void(0);" class="sidebar-toggle">
        <i class="ft-chevrons-left"></i>
    </a>
    <div class="logo">
        <a href="{{Helper::get_url("dashboard")}}">
            <span class="logo-small"><img src="{{asset('themes/backend/default/assets/img/logo.png')}}"></span>
            <span class="logo-full"><img src="{{asset('themes/backend/default/assets/img/logo12.png')}}"></span>


        </a>
    </div>
    <div class="menu">
        @php($sidebar = json_decode(file_get_contents(asset('sidebar.json')), true))
         @foreach ($sidebar as $key => $menus)
            @foreach ($menus as $key => $row)
                @if( !Helper::get_data($row, 'sub_menu') )
                    <div class="menu-item {{Helper::segment(1) == Helper::get_data($row, 'id')?'active':''}}">
                        <a href="{{Helper::get_url( Helper::get_data($row, 'id') )}}">
                            <span class="menu-icon"><i class="{{Helper::get_data($row, 'icon')}}" style="{{( Helper::get_option('appearance_icon_color', 0) &&  Helper::get_data($row, 'color') )?"color: ".Helper::get_data($row, 'color'):""}}"></i></span>
                            <span class="menu-desc">{{Helper::get_data($row, 'name')}}</span>
                        </a>
                    </div>
                @else
                    @php($ids = [])
                    @foreach ($row['sub_menu'] as $sub)
                         @php($ids[] = Helper::get_data($sub, 'id'))
                    @endforeach
                    <div class="menu-item {{in_array( Helper::segment(1), $ids, true ) ?'active':''}}">
                        <a href="javascript:void(0);">
                            <span class="menu-icon"><i class="{{Helper::get_data($row, 'icon')}}" style="{{( Helper::get_option('appearance_icon_color', 0) &&  Helper::get_data($row, 'color') )?"color: ".Helper::get_data($row, 'color'):""}}"></i></span>
                            <span class="menu-desc">{{Helper::get_data($row, 'name')}}</span>
                        </a>
                        <span class="menu-arrow">
                            <i class="ft-chevron-right"></i>
                        </span>
                        <ul class="submenu">
                            @foreach ($row['sub_menu'] as $sub)
                            <li class="{{Helper::segment(1) == Helper::get_data($sub, 'id')?'active':''}}">
                                <a href="{{Helper::get_url( Helper::get_data($sub, 'id') )}}">
                                    <span class="menu-icon"><i class="fas fa-circle"></i></span>
                                    <span class="menu-desc">{{Helper::get_data($sub, 'name')}}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            @endforeach
                <div class="menu-separator"></div>
        @endforeach
    </div>
</div>
<div class="wrapper">
    @yield('content')
</div>
</body>
{{--<script type="text/javascript" src="{{asset('themes/backend/default/assets/plugins/ckeditor/ckeditor.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('themes/backend/default/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('themes/backend/default/assets/plugins/jquery-ui/jquery-ui.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('themes/backend/default/assets/plugins/datetimepicker/jquery-ui-timepicker-addon.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('themes/backend/default/assets/plugins/custom-scrollbar/custom-scrollbar.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('themes/backend/default/assets/plugins/responsive-tab/responsive-tab.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('themes/backend/default/assets/plugins/chartjs/chart.bundle.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('themes/backend/default/assets/plugins/emojionearea/emojionearea.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('themes/backend/default/assets/plugins/nicescroll/nicescroll.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('themes/backend/default/assets/plugins/izitoast/js/izitoast.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('themes/backend/default/assets/plugins/fancybox/jquery.fancybox.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('themes/backend/default/assets/plugins/monthly/monthly.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('themes/backend/default/assets/plugins/jquery.md5/jquery.md5.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('themes/backend/default/assets/plugins/owl-carousel/js/owl.carousel.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('themes/backend/default/assets/plugins/vtdropdown/vtdropdown.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('themes/backend/default/assets/plugins/select/js/bootstrap-select.min.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('themes/backend/default/assets/plugins/touch-punch/jquery.ui.touch-punch.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('themes/backend/default/assets/plugins/ion.rangeslider/ion.rangeSlider.min.js')}}"></script>--}}
<script type="text/javascript" src="{{asset('plugins/watermark/core.js')}}"></script>
{{--<script type="text/javascript" src="{{asset('themes/backend/default/assets/js/layout.js')}}"></script>--}}
{{--<script type="text/javascript" src="{{asset('themes/backend/default/assets/js/core.js')}}"></script>--}}

<!--Javscript-->
{{--<script type="text/javascript" src="https://js.live.net/v7.2/OneDrive.js"></script>--}}
{{--<script type="text/javascript" src="https://www.dropbox.com/static/api/2/dropins.js" id="dropboxjs" data-app-key="e7j36y9a1jc468h"></script>--}}
{{--<script type="text/javascript" src="//apis.google.com/js/client.js"></script>--}}

</html>
