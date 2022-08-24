@extends('layouts.backend.app_backend')
@section('content')
    <div class="subheader {{Helper::class_main(1)}}">
        <div class="wrap">
            <div class="subheader-main">
                <button class="btn btn-label-info m-r-10 subheader-toggle"><i class="fas fa-bars"></i></button>
                <h3 class="title"><i class="text-info far fa-list-alt"></i> Caption</h3>
            </div>
            <div class="subheader-toolbar">
                <div class="btn-group" role="group">
                    <a class="btn btn-secondary actionItem" data-result="html" data-content="content-one-column"
                       data-history="{{url('caption/index/update')}}"
                       href="{{url('caption/index/update')}}" data-call-after="Core.emojioneArea();">
                        <i class="fas fa-plus"></i> Add new </a>
                </div>
            </div>
        </div>
    </div>

    <div class="content-one-column nicescroll caption" tabindex="1" style="overflow-y: hidden; outline: none;">
        <div class="wrap-m h-100">
            <div class="empty">
                <div class="icon"></div>
                <a class="btn btn-info actionItem" data-result="html" data-content="content-one-column"
                   data-history="{{url('caption/index/update')}}" href="{{url('caption/index/update')}}" data-call-after="Core.emojioneArea();">
                    <i class="fas fa-plus"></i> Add new
                </a>
            </div>
        </div>
    </div>

@endsection
