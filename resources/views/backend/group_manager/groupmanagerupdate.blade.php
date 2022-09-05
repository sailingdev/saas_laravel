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
                <input class="form-control search-input" type="text" value="" autocomplete="off" placeholder="Search">
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
            <div class="group-manager-content">
                <div class="group-manager-box" style="height: 129.333px;">
                    <div class="p-15">
                        <div class="form-group m-b-0">
                            <label>Group name</label>
                            <input type="text" class="form-control group-name" value="">
                        </div>
                        <div class="text-center text-primary d-none d-sm-block m-t-15">
                            Drag and drop to right to select and to left to unselect
                        </div>
                    </div>
                    <div class="group-list-wrap row m-l-0 m-r-0">
                        <div class="group-col col-6 p-0">
                            <div class="group-panel">
                                <div class="pn-group-header">All accounts</div>
                                <ul class="group-list connected-sortable draggable-left nicescroll p-0 ui-sortable" tabindex="3"
                                    style="overflow-y: hidden; outline: none;">
                                </ul>
                            </div>
                        </div>
                        <form action="{{url('group_manager/save')}}"
                              data-redirect="{{url('group_manager')}}" method="POST"
                              class="actionForm saveFormGroups group-col col-6 p-0">
                            <input type="hidden" name="name" value="">
                            <input type="hidden" name="ids" value="">
                            <div class="group-panel">
                                <div class="pn-group-header">Selected accounts</div>
                                <ul class="group-list connected-sortable draggable-right nicescroll p-0 ui-sortable"
                                    tabindex="4" style="overflow-y: hidden; outline: none;">
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-footer p15">
                    <button type="button" class="btn btn-info saveGroups"> Save</button>
                    <a class="btn btn-label-dark actionItem" data-result="html" data-content="column-two"
                       data-history="{{url('group_manager')}}" href="{{url('group_manager')}}">
                        Cancel
                    </a>
                </div>
                <div id="ascrail2003" class="nicescroll-rails nicescroll-rails-vr"
                     style="width: 5px; z-index: auto; cursor: default; position: absolute; top: 191px; left: 461.5px; height: 0px; display: none; opacity: 0;">
                    <div class="nicescroll-cursors"
                         style="position: relative; top: 0px; float: right; width: 5px; height: 0px; background-color: rgb(215,215,215); border: none; background-clip: padding-box; border-radius: 0px;"></div>
                </div>
                <div id="ascrail2004" class="nicescroll-rails nicescroll-rails-vr"
                     style="width: 5px; z-index: auto; cursor: default; position: absolute; top: 191px; left: 929px; height: 0px; display: none; opacity: 0;">
                    <div class="nicescroll-cursors"
                         style="position: relative; top: 0px; float: right; width: 5px; height: 0px; background-color: rgb(215, 215, 215); border: none; background-clip: padding-box; border-radius: 0px;"></div>
                </div>
            </div>
        </div>
    </div>


@endsection


