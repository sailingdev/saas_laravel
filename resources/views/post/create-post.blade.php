<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Readerstacks Google captcha in laravel 9/8/7/6/5</title>

    <link href="//netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>

<body class="antialiased">
<div class="container">
    <!-- main app container -->
    <div class="readersack">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h3>  Google captcha in laravel 9/8/7/6/5 - Readerstacks</h3>

                    <form method="post" id="validateajax" action="{{url('submit-post')}}" name="registerform">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" value="{{ old('email') }}" class="@error('email') is-invalid @enderror form-control" />

                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            @csrf
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="@error('password') is-invalid @enderror form-control" />
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" class="@error('password_confirmation') is-invalid @enderror form-control" />

                            @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="capatcha">Captcha</label>
                            <div class="captcha">
                                <span>
                                    {!! app('captcha')->display()!!}
                                </span>
                                <button type="button" class="btn btn-success refresh-cpatcha"><i class="fa fa-refresh"></i></button>
                            </div>

                            @error('g-recaptcha-response')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- credits -->
    <div class="text-center">
        <p>
            <a href="#" target="_top"> Google captcha in laravel 9/8/7/6/5 - Readerstacks</a>
        </p>
        <p>
            <a href="https://readerstacks.com" target="_top">readerstacks.com</a>
        </p>
    </div>
</div>
</body>

</html>
