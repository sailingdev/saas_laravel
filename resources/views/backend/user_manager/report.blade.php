@extends('layouts.backend.app_backend')
@section('content')
{{--    <div class="subheader {{Helper::class_main(1)}}">--}}
{{--        <div class="wrap">--}}
{{--            <div class="subheader-main wrap-m w-100 p-r-0">--}}
{{--                <div class="wrap-c">--}}
{{--                    <button type="button" class="btn btn-label-info m-r-10 subheader-toggle"><i class="fas fa-bars"></i>--}}
{{--                    </button>--}}
{{--                    <h3 class="title"><i class="far fa-user text-info" style="color: #1ac958"></i> User manager</h3>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


    <div class="subheader {{Helper::class_main(1)}}">
        <div class="wrap">
            <div class="subheader-main">
                <button class="btn btn-label-info m-r-10 subheader-toggle"><i class="fas fa-bars"></i></button>
                <h3 class="title"><i class="text-info far fa-user"></i> User manager</h3>
            </div>

            <div class="subheader-toolbar">
                <div class="btn-group" role="group">
                    <a href="{{url('user_manager/export')}}" class="btn btn-secondary">
                        <i class="fas fa-file-export"></i> Export
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="content-two-column {{Helper::class_main(1)}}">

        <div class="column-one nicescroll">
            <div class="input-group box-search-one">
                <input class="form-control search-input" type="text" autocomplete="true" placeholder="Search">
                <span class="input-group-append">
                        <button class="btn" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
            </div>

            <div class="widget">
                <div class="widget-items search-list">
                    <div class="item widget-item search-item">
                        <a href="{{url('user_manager/index')}}" class="actionItem" data-result="html"
                           data-content="column-two" data-history="{{url('user_manager/index')}}">
                                <span class="widget-section">
                                    <span class="widget-icon"><i class="far fa-user"></i></span>
                                    <span class="widget-desc">List users</span>
                                </span>
                        </a>
                    </div>
                    <div class="item widget-item search-item active">
                        <a href="{{url('user_manager/report')}}" class="actionItem" data-result="html"
                           data-content="column-two" data-history="{{url('user_manager/report')}}">
                                <span class="widget-section">
                                    <span class="widget-icon"><i class="far fa-chart-bar"></i></span>
                                    <span class="widget-desc">User report</span>
                                </span>
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <div class="column-two nicescroll">

            <div class="subheadline wrap-m m-b-30">
                <div class="sh-main wrap-c">
                    <div class="sh-title text-info fs-18 fw-5"><i class="far fa-chart-bar"></i> User report</div>
                </div>
            </div>

            <div class="m-t-10">
                <div class="row no-gutters widget-main m-b-30">
                    <div class="col">
                        <div class="widget-card p-20">
                            <div class="widget-details wrap-m">
                                <div class="widget-info wrap-c">
                                    <div class="widget-title">Active user</div>
                                    <div class="widget-desc">Number of active users</div>
                                </div>
                                <div class="widget-stats wrap-c text-success">5</div>
                            </div>
                            <div class="widget-progress progress m-b-5">
                                <div class="progress-bar bg-success" role="progressbar"
                                     style="width: 71.428571428571%" aria-valuenow="25" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                            <div class="widget-action wrap-m">
                                <div class="widget-change wrap-c">Percent</div>
                                <div class="widget-number wrap-c">71%</div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="widget-card p-20">
                            <div class="widget-details wrap-m">
                                <div class="widget-info wrap-c">
                                    <div class="widget-title">Inactive user</div>
                                    <div class="widget-desc">Number of inactive users</div>
                                </div>
                                <div class="widget-stats wrap-c text-warning">2</div>
                            </div>
                            <div class="widget-progress progress m-b-5">
                                <div class="progress-bar bg-warning" role="progressbar"
                                     style="width: 28.571428571429%" aria-valuenow="25" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                            <div class="widget-action wrap-m">
                                <div class="widget-change wrap-c">Percent</div>
                                <div class="widget-number wrap-c">29%</div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="widget-card p-20">
                            <div class="widget-details wrap-m">
                                <div class="widget-info wrap-c">
                                    <div class="widget-title">Banned user</div>
                                    <div class="widget-desc">Number of banned users</div>
                                </div>
                                <div class="widget-stats wrap-c text-danger">0</div>
                            </div>
                            <div class="widget-progress progress m-b-5">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 0%"
                                     aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="widget-action wrap-m">
                                <div class="widget-change wrap-c">Percent</div>
                                <div class="widget-number wrap-c">0%</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 m-b-25">
                        <div class="card widget-chart-activity">
                            <div class="card-body p-0">
                                <div class="chart-bg bg-info">
                                    <div class="card-top wrap-m">
                                        <h6 class="card-title wrap-c p-20"><i class="fas fa-caret-right p-r-5"></i>
                                            Register history</h6>
                                    </div>
                                </div>

                                <div class="card-box p-l-20 p-r-20">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="box-item">
                                                <span class="icon text-solid-info"><i
                                                        class="fas fa-user-plus"></i></span>
                                                <span class="title">Today</span>
                                                <span class="number">0 users</span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="box-item">
                                                    <span class="icon text-solid-success"><i
                                                            class="fas fa-user-plus"></i></span>
                                                <span class="title">This week</span>
                                                <span class="number">0 users</span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="box-item">
                                                    <span class="icon text-solid-warning"><i
                                                            class="fas fa-user-plus"></i></span>
                                                <span class="title">This month</span>
                                                <span class="number">6 users</span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="box-item">
                                                    <span class="icon text-solid-danger"><i
                                                            class="fas fa-user-plus"></i></span>
                                                <span class="title">This year</span>
                                                <span class="number">6 users</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 m-b-25">
                        <div class="card widget-user-box">
                            <div class="card-header wrap-m">
                                <div class="card-title wrap-c m-b-0 text-info"><i
                                        class="fas fa-caret-right p-r-5"></i> Recently registered users
                                </div>
                            </div>
                            <div class="card-body nicescroll no-update">
                                <div class="widget-list">
                                    <div class="widget-item widget-item-3">
                                        <a href="#">
                                            <div class="icon">
                                                <img src="https://ui-avatars.com/api/?name=wanda wang&background=5578eb&color=fff&font-size=0.5&rounded=true">
                                            </div>
                                            <div class="content content-2">
                                                <div class="title">James Hammond</div>
                                                <div class="desc"></div>
                                            </div>
                                        </a>
                                        <div class="widget-option">
                                            <span class="badge badge-danger">Banned</span>
                                        </div>
                                    </div>
                                    <div class="widget-item widget-item-3">
                                        <a href="#">
                                            <div class="icon">
                                                <img src="https://ui-avatars.com/api/?name=Testing&background=5578eb&color=fff&font-size=0.5&rounded=true">
                                            </div>
                                            <div class="content content-2">
                                                <div class="title">Testing</div>
                                                <div class="desc">Direct</div>
                                            </div>
                                        </a>

                                        <div class="widget-option">
                                            <span class="badge badge-success">Active</span>
                                        </div>
                                    </div>
                                    <div class="widget-item widget-item-3">
                                        <a href="#">
                                            <div class="icon"><img
                                                    src="https://ui-avatars.com/api/?name=Alert Bang&background=5578eb&color=fff&font-size=0.5&rounded=true">
                                            </div>
                                            <div class="content content-2">
                                                <div class="title">Clive</div>
                                                <div class="desc"></div>
                                            </div>
                                        </a>

                                        <div class="widget-option">
                                            <span class="badge badge-danger">Banned</span>
                                        </div>
                                    </div>
                                    <div class="widget-item widget-item-3">
                                        <a href="#">
                                            <div class="icon">
                                                <img src="https://ui-avatars.com/api/?name=dev test&background=5578eb&color=fff&font-size=0.5&rounded=true">
                                            </div>
                                            <div class="content content-2">
                                                <div class="title">dev test</div>
                                                <div class="desc">Direct</div>
                                            </div>
                                        </a>

                                        <div class="widget-option">
                                            <span class="badge badge-warning">Inactive</span>
                                        </div>
                                    </div>
                                    <div class="widget-item widget-item-3">
                                        <a href="#">
                                            <div class="icon"><img src="https://ui-avatars.com/api/?name=devtest1&background=5578eb&color=fff&font-size=0.5&rounded=true">
                                            </div>
                                            <div class="content content-2">
                                                <div class="title">devtest1</div>
                                                <div class="desc">Direct</div>
                                            </div>
                                        </a>

                                        <div class="widget-option">
                                            <span class="badge badge-warning">Inactive</span>
                                        </div>
                                    </div>
                                    <div class="widget-item widget-item-3">
                                        <a href="#">
                                            <div class="icon">
                                                <img src="https://ui-avatars.com/api/?name=Mitesh Lathiya&background=5578eb&color=fff&font-size=0.5&rounded=true">
                                            </div>
                                            <div class="content content-2">
                                                <div class="title">Mitesh Lathiya</div>
                                                <div class="desc">Google</div>
                                            </div>
                                        </a>

                                        <div class="widget-option">
                                            <span class="badge badge-success">Active</span>
                                        </div>
                                    </div>
                                    <div class="widget-item widget-item-3">
                                        <a href="#">
                                            <div class="icon">
                                                <img src="https://ui-avatars.com/api/?name=Pratik Mathukiya&background=5578eb&color=fff&font-size=0.5&rounded=true">
                                            </div>
                                            <div class="content content-2">
                                                <div class="title">Pratik Mathukiya</div>
                                                <div class="desc">Google</div>
                                            </div>
                                        </a>

                                        <div class="widget-option">
                                            <span class="badge badge-success">Active</span>
                                        </div>
                                    </div>
                                    <div class="widget-item widget-item-3">
                                        <a href="#">
                                            <div class="icon">
                                                <img src="https://ui-avatars.com/api/?name=Johan Forsberg&background=5578eb&color=fff&font-size=0.5&rounded=true">
                                            </div>
                                            <div class="content content-2">
                                                <div class="title">Johan Forsberg</div>
                                                <div class="desc">Facebook</div>
                                            </div>
                                        </a>
                                        <div class="widget-option">
                                            <span class="badge badge-success">Active</span>
                                        </div>
                                    </div>
                                    <div class="widget-item widget-item-3">
                                        <a href="#">
                                            <div class="icon">
                                                <img src="https://ui-avatars.com/api/?name=Admin Panel&background=5578eb&color=fff&font-size=0.5&rounded=true">
                                            </div>
                                            <div class="content content-2">
                                                <div class="title">Admin Panel</div>
                                                <div class="desc">Direct</div>
                                            </div>
                                        </a>

                                        <div class="widget-option">
                                            <span class="badge badge-success">Active</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 m-b-25">
                        <div class="card widget-user-box">
                            <div class="card-header wrap-m">
                                <div class="card-title wrap-c m-b-0 text-info"><i
                                        class="fas fa-caret-right p-r-5"></i> Login type
                                </div>
                            </div>
                            <div class="card-body h-438">
                                <div class="w-250 m-auto">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="chart-area" height="547" width="375"
                                            style="display: block; height: 365px; width: 250px;"
                                            class="chartjs-render-monitor"></canvas>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="card rounded">
                    <div class="card-header wrap-m">
                        <div class="card-title wrap-c text-info">
                            <i class="fas fa-caret-right p-r-5"></i> Last 30 days
                        </div>
                    </div>
                    <div class="card-body h-350">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="line-stacked-area" height="465" width="1264"
                                style="display: block; height: 310px; width: 843px;"
                                class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                $(function () {
                    setTimeout(function () {
                        Core.lineChart(
                            "line-stacked-area",
                            ['2022-07-25', '2022-07-26', '2022-07-27', '2022-07-28', '2022-07-29', '2022-07-30', '2022-07-31', '2022-08-01', '2022-08-02', '2022-08-03', '2022-08-04', '2022-08-05', '2022-08-06', '2022-08-07', '2022-08-08', '2022-08-09', '2022-08-10', '2022-08-11', '2022-08-12', '2022-08-13', '2022-08-14', '2022-08-15', '2022-08-16', '2022-08-17', '2022-08-18', '2022-08-19', '2022-08-20', '2022-08-21', '2022-08-22', '2022-08-23'],
                            [
                                [0, 2, 1, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0]],
                            [
                                "New register"
                            ]
                        );

                        Core.pieChart(
                            "chart-area",
                            ["Direct", "Facebook", "Google", "Twitter"],
                            [
                                4,
                                1,
                                2,
                                0]
                        );
                    }, 300);
                });
            </script>
        </div>

    </div>

@endsection
