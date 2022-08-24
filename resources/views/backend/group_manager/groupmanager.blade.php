@extends('layouts.backend.app_backend')
@section('content')
    <div class="subheader {{Helper::class_main(1)}}">
        <div class="wrap">
            <div class="subheader-main wrap-m w-100 p-r-0">
                <div class="wrap-c">
                    <button type="button" class="btn btn-label-info m-r-10 subheader-toggle"><i class="fas fa-bars"></i>
                    </button>
                    <h3 class="title"><i class="fas fa-users text-info" style="color: #1ac958"></i> Group manager</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="content-two-column group-manager">
        <div class="column-one nicescroll">
            <div class="input-group box-search-one">
                <input class="form-control search-input" type="text" value="" autocomplete="off"
                       placeholder="Search">
                <span class="input-group-append">
                    <button class="btn" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
            <div class="widget">
                <div class="widget-items search-list">
                    <div class="empty small"></div>
                </div>
            </div>
        </div>
        <div class="column-two nicescroll">
            <div class="wrap-m h-100">
                <div class="empty">
                    <div class="icon"></div>
                    <a class="btn btn-info actionItem" data-result="html" data-content="column-two"
                       data-history="{{url('group_manager/index/update')}}"
                       href="{{url('group_manager/index/update')}}"
                       data-call-after="Group_Manager.option();">
                        Add new
                    </a>
                </div>
            </div>
        </div>
    </div>


@endsection
