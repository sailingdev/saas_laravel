@extends('layouts.app')
@section('specific_css')
    <style>
        .ul {
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
        }
        .ul {
            -ms-flex-pack: center!important;
            -webkit-box-pack: center!important;
            justify-content: center!important;
        }

        ul.pagination {
            display: flex;
            padding-left: 0;
            list-style: none;!important;
            border-radius: 0.25rem;
        }

        ol li, ul li {
            list-style: none;
        }

        li {
            display: list-item;
            text-align: -webkit-match-parent;
        }

        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }


    </style>
@endsection

@section('content')
    <!-- Breadcrumb Area-->
    <div class="breadcrumb-area bg-img bg-black-overlay section_padding_130" style="background-image: url('{{asset('themes/frontend/wimax/assets/img/bg-img/testimonials.jpg')}}');">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-9 col-xl-6">
                    <div class="breadcrumb-content text-center">
                        <h2>Our latest news</h2>
                        <p>Update the latest information from us</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Blog Area-->
    <div class="wimax-blog-area section_padding_130">
        <div class="container">
            <div class="row">
                @if(isset($blogs))
                    @foreach($blogs as $key => $blog)
                        <div class="col-12 col-md-6">
                            <div class="single--post--area mb-30" style="background-image: url('{{asset('$blog->image')}}');">
                                <!-- Post Content-->
                                <div class="post-content d-flex justify-content-between">
                                    <div class="post-meta d-flex justify-content-between align-items-center">
                                        <a class="post-tag" href="#"></a>
                                        <span>
                                            <i class="lni-timer"> </i> {{Helper::date_show($blog->changed)}}
                                        </span>
                                    </div>
                                    <h2>{{Helper::cut_text($blog->name, 80)}}</h2>
                                    <a class="btn continue-btn" href="{{url("blog/".$blog->slug)}}">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                        <div class="text-center" align="center">
                            {!! $blogs->render() !!}
                        </div>
                @endif
            </div>
        </div>
    </div>
@endsection
