@include('layouts.top')
<!-- Register Area-->
<div class="register-area d-flex">
    <div class="register-content-wrapper d-flex align-items-center">
        <div class="register-content">
            <!-- Logo-->
            <a class="logo" href="{{url('/')}}">
                <img src="{{Helper::get_option('website_black', asset("themes/backend/default/assets/img/logo-black.png"))}}" alt="">
            </a>
            <h5>Welcome back.</h5>
            <p>Don't have an account?<a href="{{url('signup')}}">Sign up</a></p>
            <!-- Form-->
            <div class="register-form">
                <form action="{{route('login')}}" class="actionLogin" method="post" >
                    @csrf
                    <div class="form-group"><i class="lni-user"></i>
                        <input class="form-control  @error('email') is-invalid @enderror" type="text" name="email" value="{{ old('email') }}" placeholder="Email address" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group"><i class="lni-lock"></i>
                        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    @if(Helper::get_option('google_recaptcha_status', 0))
                        <div class="g-recaptcha m-b-15" data-sitekey="{{Helper::get_option('google_recaptcha_site_key', '')}}"></div>
                    @endif


                    <div class="custom-control custom-checkbox mb-3 mr-sm-2">
                        <input class="custom-control-input" id="rememberMe" name="remember" type="checkbox"id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="rememberMe">{{__("Keep me logged in")}}</label>
                    </div>

                    <span class="show-message"></span>
                    <button class="btn wimax-btn w-100" type="submit">{{__("Log In")}}</button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{__('Forgot Your Password?') }}
                        </a>
                    @endif
                </form>
            </div>

            @if(Helper::get_option('facebook_login_status', 0) || Helper::get_option('google_login_status', 0) || Helper::get_option('twitter_login_status', 0))
                <!-- Sign in via others-->
                <div class="signin-via-others">
                    <p>{{__("Or Log in with")}}</p>

                    @if( Helper::get_option('google_login_status', 0) )
                    <a class="btn wimax-btn btn-4 w-100 mt-15 btn-google" href="{{url("login/google")}}">
                        <img src="{{asset('assets/img/core-img/google-logo.png')}}"> {{__("Log in with Google")}}
                    </a>
                    @endif
                    @if(Helper::get_option('facebook_login_status', 0) )
                    <a class="btn wimax-btn btn-4 w-100 mt-15 btn-facebook" href="{{url("login/facebook")}}">
                        <i class="fa fa-facebook"> </i> {{__("Log in with Facebook")}}
                    </a>
                    @endif
                    @if( Helper::get_option('twitter_login_status', 0) )
                    <a class="btn wimax-btn btn-4 w-100 mt-15 btn-twitter" href="{{url("login/twitter")}}">
                        <i class="fa fa-twitter"> </i> {{__("Log in with Twitter")}}
                    </a>
                    @endif
                </div>
            @endif

        </div>
    </div>
    <!-- Register Side Content-->
    <div class="register-side-content bg-img" style="background-image: url('{{asset('themes/frontend/assets/img/bg-img/hero-7.jpg')}}');"></div>
</div>
@include('layouts.bottom')



{{--@extends('layouts.app')--}}
{{--@section('content')--}}
{{--<div class="container" style="padding-top: 90px">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Login') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('login') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                    <label class="form-check-label" for="remember">--}}
{{--                                        {{ __('Remember Me') }}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-8 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Login') }}--}}
{{--                                </button>--}}

{{--                                @if (Route::has('password.request'))--}}
{{--                                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                        {{ __('Forgot Your Password?') }}--}}
{{--                                    </a>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}
