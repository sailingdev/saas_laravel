@extends('layouts.backend.app_backend')

@section('specific_css')
    <style>
        .below_subheader {
            top: 65px;
            left: 300px;
            right: 0;
            height: 54px;
            margin-left: -25px;
            padding: 2px 25px;
            z-index: 94;
            -webkit-transition: all 0.3s ease;
            transition: all 0.3s ease;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -webkit-box-align: stretch;
            -ms-flex-align: stretch;
            align-items: stretch;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            border-bottom: 1px solid #f4f4f4;
            background: #fff;
        }

        .below_subheader .title {
            margin: 0;
            padding: 0 15px 0 0;
            font-size: 16px;
            font-weight: 500;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            line-height: 1.2;
        }

        /*.below_subheader input {*/
        /*    margin: 0;*/
        /*    padding: 0 15px 0 0;*/
        /*    font-size: 16px;*/
        /*    font-weight: 500;*/
        /*    display: -webkit-box;*/
        /*    display: -ms-flexbox;*/
        /*    display: flex;*/
        /*    -webkit-box-align: center;*/
        /*    -ms-flex-align: center;*/
        /*     align-items: center;*/
        /*     line-height: 1.2; */
        /*}*/

        .below_subheader .box-search-one{
            margin: 5px 5px 5px 5px;
        }

        .menu-item a.menu-item-active {
            color: #a48ffa!important;
            background-color: rgba(85,120,235,.1)!important;
        }

        .menu-item > a{
            border-radius: 4px;
            padding: 9px;
        }
    </style>
@endsection

@section('content')
    <div class="subheader {{Helper::class_main(1)}}">
        <div class="wrap">
            <div class="subheader-main wrap-m w-100 p-r-0">
                <div class="wrap-c">
                    <button type="button" class="btn btn-label-info m-r-10 subheader-toggle"><i class="fas fa-bars"></i>
                    </button>
                    <h3 class="title"><i class="fas fa-home text-info" style="color: #1ac958"></i> Home</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="below_subheader">
        <div class="wrap">
            <div class="subheader-main wrap-m w-100 p-r-0">
                <div class="wrap-c">
                    <div class="input-group box-search-one">
                        <input class="form-control search-input" type="text" autocomplete="off" placeholder="Search">
                        <span class="input-group-append">
                            <button class="btn" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </div>

                <div class="wrap-c">
                    <div class="menu">
                        <div class="menu-item">
                            <a class="menu-item-active" href="#" >All Posts</a>
                            <a href="#" >Published Posts</a>
                            <a href="#" >Scheduled Posts</a>
                            <a href="#" >Recurring Posts</a>
                            <a href="#" >Your Draft</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection

