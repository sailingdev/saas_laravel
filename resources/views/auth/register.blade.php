@extends('layouts.auth_app')
@section('specific_css')
    <style>
        .signup__teams__option-divider {
            text-align: center;
            position: relative;
            z-index: 1;
            font-size: 16px;
        }

        .signup__teams__p1 {
            font-size: 18px;
            color: #000;
            font-family: Graphik,system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen,Ubuntu,Cantarell,"Fira Sans","Droid Sans","Helvetica Neue",sans-serif;
        }

        .signup__teams__option-divider__wrapper {
            background-color: #ffffff;
            z-index: 1;
            position: relative;
            padding: 0 6px;
        }

        .signup__teams__option-divider:before {
            background-color: transparent;
            border-top: 1px dotted #000;
            display: block;
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            left: 0;
            top: 50%;
            z-index: 0;
        }

        div, h1, h2, h3, h4, h5, h6, p, span, label, input, button{
            font-family: "Segoe UI";
        }

        .card span{
            display: block;
            line-height: 14px;
            font-size: 10pt;
        }
        .card span.line-height-gray{
            color: #5a6268;
            line-height: 16px
        }

        @media only screen and (min-width: 763px) {
            .margin-for-bottom {
                margin-bottom: 90%;
            }
        }

        @media only screen and (max-width: 762px) {
            .margin-for-bottom {
                margin-bottom: 5%;
            }
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-7 col-lg-7" style="padding: 50px 13% 30px 13%">
                <h2 class="text-center">Create your account</h2>
                <p>{{__("Already hava an account?")}}
                    <a href="{{route("login")}}">{{__("Log In")}}</a>
                </p>

                <div class="input-group mb-3 input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="background:white">
                        <img width="20" src="{{asset('themes/frontend/wimax/assets/img/core-img/google-logo.png')}}">
                        </span>
                    </div>
                    <input type="button" style="height: 40px" class="form-control btn btn-primary" value="Signup with google">
                </div>

                <div class="signup__teams__option-divider signup__teams__p1" style="margin-top: 20px">
                      <span class="signup__teams__option-divider__wrapper">
                        Or, register with your email
                      </span>
                </div>

                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="fullname">Full Name:</label>
                        <input type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" placeholder="Enter full name" id="fullname" required autocomplete="name" autofocus>
                        @error('fullname')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter email" id="email" required autocomplete="email" autofocus>
                        @error('email')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" placeholder="Enter password" id="pwd" required autocomplete="new-password">
                        @error('password')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="confirm_pwd">Confirm password:</label>
                        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm password" id="confirm_pwd" required autocomplete="new-password">
                    </div>

                    <div class="form-group">
                        <label for="confirm_pwd">Timezone:</label>
                        <select name="timezone" class="form-control auto-select-timezone">
                            @if(!empty(Helper::tz_list()))
                                @foreach (Helper::tz_list() as $zone => $time)
                                    <option value="{{__( $zone )}}">{{__( $time )}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

{{--                    <div class="form-group">--}}
{{--                        <span>{!! app('captcha')->display() !!}</span>--}}
{{--                        @error('g-recaptcha-response')--}}
{{--                        <div class="text-danger">--}}
{{--                            {{$message}}--}}
{{--                        </div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}


                    <div class="form-group form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox"> Accept <a style="font-size: 13px; color: #91799b" href="{{url('terms_and_policies')}}">{{__("Terms & Conditions")}}</a>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block text-uppercase">Signup</button>
                </form>
            </div>
            <div class="col-12 col-md-5 col-lg-5"
                 style="background-position: top;
                background-repeat: no-repeat;
                background-size: cover;
                padding: 6.5%;
                justify-content: space-between;
                background-image: url({{'themes/frontend/wimax/assets/img/bg-img/checkout-sidebar-background.svg'}});">

                <div class="card">
                    <div class="card-body">
                        <span class="text-uppercase" style="color: #e3761e">starter</span>
                        <h4>14 day free trial</h4>

                        <span class="font-weight-bold text-uppercase mt-3">seats</span>
                        <span class="line-height-gray">2 seats</span>

                        <span class="font-weight-bold text-uppercase mt-3">Inbound</span>
                        <span class="line-height-gray">Unlimited conversations</span>

                        <span class="font-weight-bold text-uppercase mt-3">Outbound</span>
                        <span class="line-height-gray">1,000 people reached/mo</span>
                    </div>
                    <div class="card-footer">
                        <strong>
                            Due today
                        </strong>
                        <strong style="float: right">
                            $0
                        </strong>
                    </div>
                </div>

                <p class="text-center mt-3 margin-for-bottom" style="font-size: 11pt;">
                    All prices USD. Your total may also include usage charges and taxes, if applicable.
                </p>

                <div class="row text-center">
                    <div class="col-md-4 col-12 col-sm-4">
                        <i class='fa-solid fas fa-chart-bar'style='font-size:24px'></i>
                        <p>
                            Conversation Rate
                        </p>
                    </div>
                    <div class="col-md-4 col-12 col-sm-4">
                        <i class='fas fa-chart-line' style='font-size:24px'></i>
                        <p>
                            Email Subscribers
                        </p>

                    </div>
                    <div class="col-md-4 col-12 col-sm-4">
                        <i class="fas fa-chart-pie" style="font-size: 24px"></i>
                        <p>Customer Engagement</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('specific_js')
{{--    <script src='https://kit.fontawesome.com/a076d05399.js'></script>--}}
    <script src='{{asset('plugins/all.min.js')}}'></script>
@stop
