@extends('layouts.backend.app_backend')
@section('content')
    <div class="subheader {{Helper::class_main(1)}}">
        <div class="wrap">
            <div class="subheader-main wrap-m w-100 p-r-0">
                <div class="wrap-c">
                    <button type="button" class="btn btn-label-info m-r-10 subheader-toggle"><i class="fas fa-bars"></i>
                    </button>
                    <h3 class="title"><i class="fas fa-chart-line text-info" style="color: #1ac958"></i> Analytics</h3>
                </div>

            </div>
        </div>
    </div>


    <div class="content-two-column {{Helper::class_main(1)}}">
        <div class="column-two nicescroll" style="width: 100%; margin: 0">

            <div class="container-fluid mt-2">
                <div class="card rounded">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-2">
                                <select class="form-control filter-type">
                                    <option value="facebook">Facebook</option>
                                    <option value="instagram">Instagram</option>
                                    <option value="twitter">Twitter</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-2">
                                <button class="btn btn-primary">Analyze</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid mt-2">
                <div class="card rounded">
                    <div class="card-body">
                        <p>Overview</p>
                        <div class="row">
                            <div class="col-12 col-md-2">
                                <div class="p-25 bg-solid-info rounded">
                                    <div class="wrap-m">
                                        <div>
                                            <div>Total Page Likes</div>
                                            <h3 class="success w-100">605</h3>
                                        </div>
                                        <div class="wrap-c">
                                            <i class="fas fa-thumbs-up float-right text-info fs-45"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="p-25 bg-solid-success rounded">
                                    <div class="wrap-m">
                                        <div>
                                            <div>Page Reach</div>
                                            <h3 class="success w-100">1</h3>
                                        </div>
                                        <div class="wrap-c">
                                            <i class="fas fa-volume-up float-right text-info fs-45"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="p-25 bg-solid-danger rounded">
                                    <div class="wrap-m">
                                        <div>
                                            <div>PostEngagement</div>
                                            <h3 class="success w-100">20</h3>
                                        </div>
                                        <div class="wrap-c">
                                            <i class="fas fa-trophy float-right text-info fs-45"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="p-25 bg-solid-primary rounded">
                                    <div class="wrap-m">
                                        <div>
                                            <div>Page Clicks</div>
                                            <h3 class="success w-100">9</h3>
                                        </div>
                                        <div class="wrap-c">
                                            <i class="fas fa-hand-pointer float-right text-info fs-45"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="p-25 bg-solid-warning rounded">
                                    <div class="wrap-m">
                                        <div>
                                            <div>Total Fans</div>
                                            <h3 class="success w-100">20</h3>
                                        </div>
                                        <div class="wrap-c">
                                            <i class="fa fa-users float-right text-info fs-45"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="p-25 bg-solid-info rounded">
                                    <div class="wrap-m">
                                        <div>
                                            <div>Post Published</div>
                                            <h3 class="success w-100">0</h3>
                                        </div>
                                        <div class="wrap-c">
                                            <i class="fas fa-upload float-right text-info fs-45"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <?php
                $successed = Helper::schedule_report(Helper::segment(3), "all", 3);
                $failed = Helper::schedule_report(Helper::segment(3), "all", 4);
            ?>

            <div class="container-fluid mt-2">
                <div class="card rounded">
                    <div class="card-header wrap-m">
                        <div class="card-title wrap-c text-info"><i class="fas fa-caret-right p-r-5"></i> Audience Growth</div>
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

            <?php
                 $successed = Helper::schedule_report(Helper::segment(3), "all", 3);
                 $failed = Helper::schedule_report(Helper::segment(3), "all", 4);
            ?>

            <div class="container-fluid mt-2">
                <div class="card rounded">
                    <div class="card-header wrap-m">
                        <div class="card-title wrap-c text-info"><i class="fas fa-caret-right p-r-5"></i> Audience Engagement</div>
                    </div>
                    <div class="card-body h-300">
                        <canvas id="line-stacked-area1" height="300"></canvas>
                    </div>
                    <script type="text/javascript">
                        $(function(){
                            setTimeout(function(){
                                Core.lineChart(
                                    "line-stacked-area1",
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
    </div>
@endsection
