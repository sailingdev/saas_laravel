@extends('layouts.backend.app_backend')
@section('content')
    <div class="subheader {{Helper::class_main(1)}}">
        <div class="wrap">
            <div class="subheader-main wrap-m w-100 p-r-0">
                <div class="wrap-c">
                    <button type="button" class="btn btn-label-info m-r-10 subheader-toggle"><i class="fas fa-bars"></i>
                    </button>
                    <h3 class="title"><i class="fas fa-desktop text-info" style="color: #1ac958"></i> Dashboard</h3>
                </div>
            </div>
        </div>
    </div>


    <div class="content-two-column {{Helper::class_main(1)}}">
        <div class="column-one nicescroll">
            <div class="input-group box-search-one">
                <input class="form-control search-input" type="text" autocomplete="off" placeholder="Search">
                <span class="input-group-append">
                    <button class="btn" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>

            <div class="widget">
                <div class="widget-list search-list">
                    <div class="widget-item widget-item-3 search-list active" data-pid="">
                        <a href="{{url('dashboard/index')}}" class="actionItem"
                           data-result="html" data-content="column-two"
                           data-history="{{url('dashboard/index')}}"
                           data-call-after="Layout.tooltip();">
                            <div class="icon border"><i class="fas fa-chart-bar" style="color: #fa7070"></i></div>
                            <div class="content content-2">
                                <div class="title fw-4">All</div>
                                <div class="desc">Report</div>
                            </div>
                        </a>
                        <div class="widget-option">
                            <label class="i-radio i-radio--tick i-radio--brand m-t-6">
                                <input type="radio" name="account[]" class="check-item" checked="" value="">
                                <span></span>
                            </label>
                        </div>
                    </div>


                    <div class="widget-item widget-item-3 search-list " data-pid="">
                        <a href="{{url('dashboard/index/facebook')}}" class="actionItem"
                           data-result="html" data-content="column-two"
                           data-history="{{url('dashboard/index/facebook')}}"
                           data-call-after="Layout.tooltip();">
                            <div class="icon border"><i class="fab fa-facebook-square" style="color: #3b5998"></i></div>
                            <div class="content content-2">
                                <div class="title fw-4">Facebook</div>
                                <div class="desc">Report</div>
                            </div>
                        </a>

                        <div class="widget-option">
                            <label class="i-radio i-radio--tick i-radio--brand m-t-6">
                                <input type="radio" name="account[]" class="check-item" value="facebook">
                                <span></span>
                            </label>
                        </div>
                    </div>


                    <div class="widget-item widget-item-3 search-list " data-pid="">
                        <a href="{{url('dashboard/index/instagram')}}" class="actionItem"
                           data-result="html" data-content="column-two"
                           data-history="{{url('dashboard/index/instagram')}}"
                           data-call-after="Layout.tooltip();">
                            <div class="icon border"><i class="fab fa-instagram" style="color: #d62976"></i></div>
                            <div class="content content-2">
                                <div class="title fw-4">Instagram</div>
                                <div class="desc">Report</div>
                            </div>
                        </a>

                        <div class="widget-option">
                            <label class="i-radio i-radio--tick i-radio--brand m-t-6">
                                <input type="radio" name="account[]" class="check-item" value="instagram">
                                <span></span>
                            </label>
                        </div>
                    </div>


                    <div class="widget-item widget-item-3 search-list " data-pid="">
                        <a href="{{url('dashboard/index/twitter')}}" class="actionItem"
                           data-result="html" data-content="column-two"
                           data-history="{{url('dashboard/index/twitter')}}"
                           data-call-after="Layout.tooltip();">
                            <div class="icon border"><i class="fab fa-twitter" style="color: #00acee"></i></div>
                            <div class="content content-2">
                                <div class="title fw-4">Twitter</div>
                                <div class="desc">Report</div>
                            </div>
                        </a>
                        <div class="widget-option">
                            <label class="i-radio i-radio--tick i-radio--brand m-t-6">
                                <input type="radio" name="account[]" class="check-item" value="twitter">
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="column-two nicescroll">
            <?php
            $report_list = json_decode(file_get_contents(asset('sidebar.json')), true)['2'];
            $module_name = "facebook_post";

            $successed = Helper::schedule_report(Helper::segment(3), "all", 3);
            $failed = Helper::schedule_report(Helper::segment(3), "all", 4);

            $success_total = 0;
            $error_total = 0;
            if(!empty($report_list)){
                foreach ($report_list as $report) {
                    if( isset($report['sub_menu']) && !empty($report['sub_menu']) ){
                        foreach ($report['sub_menu'] as $key => $module_name) {
                            if(isset($module_name["id"])){
                                $success_total += Helper::_gt($module_name["id"]."_success_count", 0);
                                $error_total += Helper::_gt($module_name["id"]."_error_count", 0);
                            }
                        }
                    }
                }
            }
            ?>

            <div class="row">
                <div class="col-lg-12 col-sm-12 m-b-25">
                    <div class="card rounded">
                        <div class="card-header wrap-m">
                            <div class="card-title wrap-c text-info"><i class="fas fa-caret-right p-r-5"></i> Last 30 days</div>
                        </div>
                        <div class="card-body h-300">
                            <canvas id="line-stacked-area" height="300"></canvas>
                        </div>
                        <script type="text/javascript">
                            $(function(){
                                setTimeout(function(){
                                    Core.lineChart(
                                        "line-stacked-area",
                                        <?=$successed->date?>,
                                        [
                                            <?=$successed->value?>,
                                            <?=$failed->value?>
                                        ],
                                        [
                                            "Successed",
                                            "Failed"
                                        ]
                                    );
                                }, 300);
                            });
                        </script>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 m-b-25">
                    <div class="p-25 bg-solid-info rounded">
                        <div class="wrap-m">
                            <div>
                                <h3 class="success w-100">{{$success_total}}</h3>
                                <div>Successed</div>
                            </div>
                            <div class="wrap-c">
                                <i class="fas fa-paper-plane float-right text-info fs-45"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 m-b-25">
                    <div class="p-25 bg-solid-warning rounded">
                        <div class="wrap-m">
                            <div>
                                <h3 class="danger">{{$error_total}}</h3>
                                <span>Failed</span>
                            </div>
                            <div class="wrap-c">
                                <i class="fas fa-exclamation-triangle float-right text-warning fs-45"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 m-b-25">
                    <div class="p-25 bg-solid-success rounded">
                        <div class="wrap-m">
                            <div>
                                <h3 class="primary">{{$error_total + $success_total}}</h3>
                                <span>Total</span>
                            </div>
                            <div class="wrap-c">
                                <i class="fas fa-calendar-check float-right text-success fs-45"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('specific_js')
{{--    <script type="text/javascript" src="{{asset('themes/backend/default/assets/js/core.js')}}"></script>--}}
@endsection
