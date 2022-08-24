@extends('layouts.backend.app_backend')
@section('content')
    <div class="subheader {{Helper::class_main(1)}}">
        <div class="wrap">
            <div class="subheader-main wrap-m w-100 p-r-0">
                <div class="wrap-c">
                    <button type="button" class="btn btn-label-info m-r-10 subheader-toggle"><i class="fas fa-bars"></i>
                    </button>
                    <h3 class="title"><i class="far fa-calendar-alt text-info" style="color: #1ac958"></i> Schedules</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="content-three-column schedules">
        <div class="column-one nicescroll">
            <div class="input-group box-search-one">
                <input class="form-control search-input" type="text" autocomplete="off" placeholder="Search">
                <span class="input-group-append">
                    <button class="btn" type="button">
                        <i class="fa fa-search"></i>
                    </button>
	            </span>
            </div>
            <div class="widget-list widget-solid schedules-type">
                <div class="widget-item widget-item-2 search-item active" data-time="" data-type="queue"
                     data-category="all">
                    <a href="{{url('schedules/index/queue/all/')}}">
                        <div class="icon"><i class="fas fa-circle-notch fa-spin"></i></div>
                        <div class="content content-1">
                            <div class="title fw-5">Queue</div>
                        </div>
                    </a>
                </div>
                <div class="widget-item widget-item-2 search-item " data-time="" data-type="published"
                     data-category="all">
                    <a href="{{url('schedules/index/published/all/')}}">
                        <div class="icon"><i class="fas fa-check-double"></i></div>
                        <div class="content content-1">
                            <div class="title fw-5">Published</div>
                        </div>
                    </a>
                </div>
                <div class="widget-item widget-item-2 search-item " data-time="" data-type="unpublished"
                     data-category="all">
                    <a href="{{url('schedules/index/unpublished/all/')}}">
                        <div class="icon"><i class="fas fa-exclamation-circle"></i></div>
                        <div class="content content-1">
                            <div class="title fw-5">Unpublished</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="sub-sidebar-headline fs-14 fw-6 m-t-20 text-info m-b-10">
                <i class="fas fa-filter"></i>
                <span class="text-uppercase">Schedules of</span>
            </div>
            <div class="widget schedules-of">
                <div class="widget-list search-list">
                    <div class="widget-item widget-item-3 search-list">
                        <a href="#">
                            <div class="icon border">
                                <i class="fas fa-share-alt-square"></i>
                            </div>
                            <div class="content content-1">
                                <div class="title fw-4">All schedules</div>
                            </div>
                        </a>
                        <div class="widget-option">
                            <label class="i-radio i-radio--tick i-radio--brand">
                                <input type="radio" name="module" class="check-item" checked="" value="all">
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="widget-item widget-item-3 search-list">
                        <a href="#">
                            <div class="icon border">
                                <i class="fab fa-facebook-square" style="color: #3b5998"></i>
                            </div>
                            <div class="content content-1">
                                <div class="title fw-4">Facebook Post</div>
                            </div>
                        </a>
                        <div class="widget-option">
                            <label class="i-radio i-radio--tick i-radio--brand">
                                <input type="radio" name="module" class="check-item" value="facebook_post">
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="widget-item widget-item-3 search-list">
                        <a href="#">
                            <div class="icon border">
                                <i class="fab fa-instagram" style="color: #d62976"></i>
                            </div>
                            <div class="content content-1">
                                <div class="title fw-4">Instagram Post</div>
                            </div>
                        </a>
                        <div class="widget-option">
                            <label class="i-radio i-radio--tick i-radio--brand">
                                <input type="radio" name="module" class="check-item" value="instagram_post">
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="widget-item widget-item-3 search-list">
                        <a href="#">
                            <div class="icon border">
                                <i class="fab fa-twitter" style="color: #00acee"></i>
                            </div>
                            <div class="content content-1">
                                <div class="title fw-4">Twitter Post</div>
                            </div>
                        </a>
                        <div class="widget-option">
                            <label class="i-radio i-radio--tick i-radio--brand">
                                <input type="radio" name="module" class="check-item" value="twitter_post">
                                <span></span>
                            </label>
                        </div>
                    </div>

                </div>
            </div>
            <form action="{{url('schedules/delete/multi')}}" class="actionForm" data-redirect=""
                  data-confirm="Are you sure to delete this items?">
                <div class="sub-sidebar-headline fs-14 fw-6 m-t-20 text-info m-b-10">
                    <i class="far fa-trash-alt"></i> <span class="text-uppercase">Delete schedules</span>
                </div>
                <div class="card border-0 b-r-4">
                    <div class="card-body bg-solid-info b-r-4">
                        <div class="m-b-0">
                            <label class="i-radio i-radio--brand">
                                Queue <input type="radio" name="type" checked="" value="queue">
                                <span></span>
                            </label>
                        </div>
                        <div class="m-b-0">
                            <label class="i-radio i-radio--brand"> Published
                                <input type="radio" name="type" value="published">
                                <span></span>
                            </label>
                        </div>
                        <div class="m-b-0">
                            <label class="i-radio i-radio--brand"> Unpublished
                                <input type="radio" name="type" value="unpublished">
                                <span></span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category">
                                <option value="all"> All</option>
                                <option value="facebook_post"> Facebook Post</option>
                                <option value="instagram_post"> Instagram Post</option>
                                <option value="twitter_post"> Twitter Post</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-danger btn-block">Delete</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="comlumn-three-main">
            <div class="column-two nicescroll">
                <div class="row lg">
                    <div class="calendar" id="schedule-calendar" data-result="html" data-content="column-three"></div>
                </div>
            </div>

            <div class="column-three nicescroll">
                <div class="wrap-m h-100">
                    <div class="empty">
                        <div class="icon"></div>
                        <a class="btn btn-info" href="{{url('post')}}">
                            <i class="far fa-plus-square"></i> Add post
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection
