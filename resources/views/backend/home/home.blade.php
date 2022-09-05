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


    <div class="content-three-column {{Helper::class_main(1)}}">
        <div class="column-one nicescroll" style="padding: 0; background: #fff!important;">

            <div class="card-header" style="background: #fff">
                <span style="border-bottom: #f1ed21 solid 3px">
                  Facebook
                </span>
            </div>

            <div class="p-10" style="padding-top: 30px!important;">
                <p>Preferred Audience <i class="fa fa-exclamation-circle" aria-hidden="true"></i></p>
                <p>Restricted Audience <i class="fa fa-exclamation-circle" aria-hidden="true"></i></p>
            </div>

        </div>


        <div class="comlumn-three-main">
            <div class="column-two nicescroll" style="width: 70%">
                <div class="post post-create">
                    <div class="post-overplay"><div class="loader loader1"><div><div><div><div></div></div></div></div></div></div>
                    <div class="headline m-b-25">
                        <div class="title fs-16 text-info">
                            <i class="far fa-edit"></i> New post
                        </div>
                    </div>
                    <div class="row lg post-type m-b-15">


                    </div>

                </div>
            </div>
            <div class="column-three nicescroll" style="width: 30%">



            </div>
        </div>
    </div>






@endsection

