@include('layouts.top')
<!-- Register Area-->
<div class="register-area d-flex">
    <div class="register-content-wrapper d-flex align-items-center">
        <div class="register-content">
            <!-- Logo-->
            <a class="logo" href="{{url('/')}}">
                <img src="{{Helper::get_option('website_black', asset("themes/backend/default/assets/img/logo-black.png"))}}" alt="">
            </a>
            <h5>{{__("Create your free account.")}}</h5>
            <p>{{__("Already hava an account?")}}
                <a href="{{route("login")}}">{{__("Log In")}}</a>
            </p>
            <!-- Form-->
            <div class="register-form">
                <form class="actionLogin" action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="form-group"><i class="lni-user"></i>
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
                        <input class="form-control @error('email') is-invalid @enderror" type="password" name="password" placeholder="{{__("Password")}}" required autocomplete="new-password">
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
    <!-- Register Side Content-->
    <div class="register-side-content bg-img" style="background-image: url({{asset('themes/frontend/wimax/assets/img/bg-img/hero-6.jpg')}});"></div>
@include('layouts.bottom')
