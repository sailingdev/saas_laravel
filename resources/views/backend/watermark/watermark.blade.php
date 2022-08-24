@extends('layouts.backend.app_backend')
@section('content')
    <div class="subheader {{Helper::class_main(1)}}">
        <div class="wrap">
            <div class="subheader-main wrap-m w-100 p-r-0">
                <div class="wrap-c">
                    <button type="button" class="btn btn-label-info m-r-10 subheader-toggle"><i class="fas fa-bars"></i>
                    </button>
                    <h3 class="title"><i class="fas fa-medal text-info" style="color: #1ac958"></i> Watermark</h3>
                </div>
            </div>
        </div>
    </div>


    <div class="content-two-column watermark">

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
                    <div class="empty small"></div>
                </div>
            </div>
        </div>

        <div class="column-two nicescroll">
            <div class="watermark-content row">
                <div class="watermark-option col-md-8">
                    <div class="row">
                        <div class="col-md-5 col-sm-5 m-b-25">
                            <input type="text" name="ids" class="d-none watermark-ids" value="{{$result->ids}}">
                            <div class="watermark-image">
                                <img class="watermark-bg" src="{{asset('system/watermark/assets/img/bg-watermark.jpg')}}" >
                                @if( $result->watermark_mask != "")
                                    <img class="watermark-mask" src="{{url($result->watermark_mask)}}">
                                @else
                                    <img class="watermark-mask" src="{{asset('system/watermark/assets/img/watermark.png')}}">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7 m-b-25">
                            <div class="form-group">
                                <span>Position</span>
                                <div class="watermark-positions">
                                    <div class="watermark-position-item pos-lt {{$result->watermark_position=="lt"?"active":""}}" data-direction="lt"></div>
                                    <div class="watermark-position-item pos-ct {{$result->watermark_position=="ct"?"active":""}}" data-direction="ct"></div>
                                    <div class="watermark-position-item pos-rt {{$result->watermark_position=="rt"?"active":""}}" data-direction="rt"></div>
                                    <div class="watermark-position-item pos-lc {{$result->watermark_position=="lc"?"active":""}}" data-direction="lc"></div>
                                    <div class="watermark-position-item pos-cc {{$result->watermark_position=="cc"?"active":""}}" data-direction="cc"></div>
                                    <div class="watermark-position-item pos-rc {{$result->watermark_position=="rc"?"active":""}}" data-direction="rc"></div>
                                    <div class="watermark-position-item pos-lb {{$result->watermark_position=="lb"?"active":""}}" data-direction="lb"></div>
                                    <div class="watermark-position-item pos-cb {{$result->watermark_position=="cb"?"active":""}}" data-direction="cb"></div>
                                    <div class="watermark-position-item pos-rb {{$result->watermark_position=="rb"?"active":""}}" data-direction="rb"></div>
                                    <input type="hidden" class="watermark-position form-control" name="position" value="{{$result->watermark_position}}">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <span>Size</span>
                                <input type="range" name="size" class="rangeslider d-none watermark-size" min="0" max="100" step="1" value="{{$result->watermark_size}}" data-rangeslider data-orientation="vertical" >
                            </div>
                            <div class="form-group m-b-25">
                                <span>Transparent</span>
                                <input type="range" name="opacity" class="rangeslider d-none watermark-transparent" min="0" max="100" step="1" value="{{$result->watermark_opacity}}" data-orientation="vertical" >
                            </div>

                            <div class="wrap-m">
                                <div class=" wrap-c">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-label-info fileinput-button" >
                                            <i class="fas fa-upload"></i> Upload
                                            <input id="watermark_upload" type="file" name="files[]">
                                        </button>
                                        <a href="{{url('delete')}}" data-confirm="Are you sure to delete this items?" data-id="{{$result->ids}}" class="btn btn-label-danger actionItem" data-redirect=""><i class="far fa-trash-alt"></i> Delete</a>
                                    </div>
                                </div>
                                <div class=" wrap-c">
                                    <button type="submit" class="btn btn-info btn-upload-watermark"> Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection
