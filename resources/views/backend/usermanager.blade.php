@extends('layouts.backend.app_backend')
@section('content')
    <div class="subheader {{Helper::class_main(1)}}">
        <div class="wrap">
            <div class="subheader-main wrap-m w-100 p-r-0">
                <div class="wrap-c">
                    <button type="button" class="btn btn-label-info m-r-10 subheader-toggle"><i class="fas fa-bars"></i>
                    </button>
                    <h3 class="title"><i class="far fa-user text-info" style="color: #1ac958"></i> User manager</h3>
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


        </div>
    </div>

@endsection
