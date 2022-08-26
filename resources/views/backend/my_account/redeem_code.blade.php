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




        .social.fab {
            padding: 5px;
            font-size: 20px;
            width: 30px;
            text-align: center;
            text-decoration: none;
            border-radius: 50%;
        }

        .social.fab:hover {
            opacity: 0.7;
        }


        .social.fa-google {
            background: #dd4b39;
            color: white;
        }

    </style>
@endsection

@section('content')
    @include('backend.my_account.subheader')
    <div class="content-two-column {{Helper::class_main(1)}}">
        <div class="column-two nicescroll" style="width: 100%; margin: 0;">
            <div>Manage your account</div>
            <div class="card rounded mt-2">
                <div class="card-body">
                    <div class="row">
                        <span class="p-10">
                            <i class="fa fa-user fa-3x"></i>
                        </span>
                        <div class="col-md-3 pt-2">
                            <strong>Name</strong><br>
                            Johan Forsberg
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>


@endsection
