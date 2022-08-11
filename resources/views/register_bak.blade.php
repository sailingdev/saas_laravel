@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top: 90px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


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
            background-color: #f3f3fe;
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

    </style>
@stop
@section('content')

    <!-- Register Area-->
    <div class="register-area d-flex">
        <div class="register-content-wrapper d-flex align-items-center" style="padding-top: 50px;">
            <div class="row">
                <div class="register-content">
                    <!-- Logo-->
                    <a class="logo text-center" href="{{url('/')}}">
                        <img width="110" src="{{asset('themes/backend/default/assets/img/logo12.png')}}" alt="">
                    </a>
                    <h2>{{__("Create your free account.")}}</h2>
                    <p>{{__("Already hava an account?")}}
                        <a href="{{route("login")}}">{{__("Log In")}}</a>
                    </p>

                    <div class="signin-via-others">
                        @if( Helper::get_option('google_login_status', 0) )
                            <a class="btn wimax-btn btn-4 w-100 mb-15 btn-google" href="{{url("login/google")}}">
                                <img src="{{asset('themes/frontend/wimax/assets/img/core-img/google-logo.png')}}"> {{__("Log in with Google")}}
                            </a>
                        @endif
                    </div>

                    <div class="signup__teams__option-divider signup__teams__p1 mt-15">
                      <span class="signup__teams__option-divider__wrapper">
                        Or, register with your email
                      </span>
                    </div>

                    <!-- Form-->
                    <div class="register-form mt-30">
                        <form class="actionLogin" action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <i class="lni-user"></i>
                                <input class="form-control @error('fullname') is-invalid @enderror" type="text" name="fullname" value="{{ old('fullname') }}" placeholder="{{__("Full Name")}}" required autocomplete="name" autofocus>
                                @error('fullname')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                            <div class="form-group"><i class="lni-envelope"></i>
                                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"  value="{{ old('email') }}" placeholder="{{__("Email Address")}}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>

                            <div class="form-group"><i class="lni-lock"></i>
                                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="{{__("Password")}}" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group"><i class="lni-lock"></i>
                                <input class="form-control" type="password" name="confirm_password" placeholder="{{__("Confirm password")}}"  required autocomplete="new-password">
                            </div>


                            <div class="form-group"><i class="lni lni-timer"></i>
                                <select name="timezone" class="form-control auto-select-timezone">
                                    @if(!empty(Helper::tz_list()))
                                        @foreach (Helper::tz_list() as $zone => $time)
                                            <option value="{{__( $zone )}}">{{__( $time )}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            @if(Helper::get_option('google_recaptcha_status', 0))
                                <div class="g-recaptcha m-b-15" data-sitekey="{{Helper::get_option('google_recaptcha_site_key', '')}}"></div>
                            @endif

                            <div class="custom-control custom-checkbox mb-3 mr-sm-2">
                                <input class="custom-control-input" id="rememberMe" type="checkbox" name="terms">
                                <label class="custom-control-label" for="rememberMe">
                                    Accept <a style="font-size: 13px; color: #91799b" href="{{url('terms_and_policies')}}">{{__("Terms & Conditions")}}</a>
                                </label>
                            </div>

                            <span class="show-message"></span>
                            <button class="btn wimax-btn w-100" type="submit">{{__("Signup")}}</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- Register Side Content-->
        {{--    <div class="register-side-content bg-img" style="background-image: url({{asset('themes/frontend/wimax/assets/img/bg-img/hero-6.jpg')}});"></div>--}}
    </div>
@endsection
@include('layouts.bottom')
