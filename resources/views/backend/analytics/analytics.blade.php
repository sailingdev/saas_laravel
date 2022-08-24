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

    <div class="container-fluid mt-2">
        <div class="card">
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
        <div class="card">
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


    <div class="container-fluid mt-2">
        <div class="card">
            <div class="card-body">
                dd
            </div>
        </div>
    </div>





@endsection
