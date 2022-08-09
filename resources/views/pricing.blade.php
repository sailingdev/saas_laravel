@extends('layouts.app')
@section('specific_css')
    <style>
        .lni-question-circle {
            position: relative;
        }

        .lni-question-circle span {
            display: none;
        }

        .lni-question-circle:hover span {
            font-family: arial;
            border: 0;
            border-radius: 3px;
            padding: 15px;
            display: block;
            z-index: 100;
            background: #fff;
            box-shadow: 0 1px 6px 0 rgb(32 33 36 / 28%);
            left: 0%;
            transform: translate(-50%, 0);
            margin: 10px;
            width: 150px;
            position: absolute;
            color: #333;
            top: 10px;
            text-decoration: none;
        }
    </style>
@endsection
@section('content')

    <!-- Breadcrumb Area-->
    <div class="breadcrumb-area bg-img bg-black-overlay section_padding_100"
         style="background-image: url('{{asset('themes/frontend/wimax/assets/img/bg-img/testimonials.jpg')}}');">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-9 col-xl-6">
                    <div class="breadcrumb-content text-center">
                        <h2>Choose your plan</h2>
                        <p>For 5 years we have been developing for providing better services</p>
                        <div class="plan-option">
                            <p>Monthly</p>
                            <label class="switch pricing-tab-switcher">
                                <input type="checkbox">
                                <span class="slider round"></span>
                            </label>
                            <p>Annually</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- CTA Area-->
    <div class="cta-area section_padding_130_80">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-sm-8">
                    <div class="cta-content mb-50">
                        <h3 class="mb-0">Start your free trial. Are you ready to try service reign? ! No contract. No credit card</h3>
                    </div>
                </div>
                <div class="col-12 col-sm-4 text-sm-right"><a class="btn wimax-btn btn-4 mb-50" href="{{url("register")}}">Start A Free Trial</a></div>
            </div>
        </div>
    </div>

@endsection
