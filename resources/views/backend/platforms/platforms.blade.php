@extends('layouts.backend.app_backend')
@section('content')
    <div class="subheader {{Helper::class_main(1)}}">
        <div class="wrap">
            <div class="subheader-main wrap-m w-100 p-r-0">
                <div class="wrap-c">
                    <button type="button" class="btn btn-label-info m-r-10 subheader-toggle"><i class="fas fa-bars"></i>
                    </button>
                    <h3 class="title">
                        <i class="fas fa-border-all text-info" style="color: #1ac958"></i>
                        Platforms
                    </h3>
                </div>

            </div>
        </div>
    </div>


    <div class="content-two-column {{Helper::class_main(1)}}">
        <div class="column-two nicescroll" style="width: 100%; margin: 0">
            <div>Connect your social account(s) to start posting</div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card rounded" style="cursor: pointer">
                        <div class="card-body text-center">
                            <i class="fab fa-facebook fa-9x" aria-hidden="true"></i>
                            <h5 class="mt-2">
                                facebook
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card rounded" style="cursor: pointer">
                        <div class="card-body text-center">
                            <i class="fab fa-twitter fa-9x" aria-hidden="true"></i>
                            <h5 class="mt-2">
                                twitter
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card rounded" style="cursor: pointer">
                        <div class="card-body text-center">
                            <i class="fab fa-instagram fa-9x" aria-hidden="true"></i>
                            <h5 class="mt-2">
                                instagram
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card rounded" style="cursor: pointer">
                        <div class="card-body text-center">
                            <i class="fab fa-linkedin fa-9x" aria-hidden="true"></i>
                            <h5 class="mt-2">
                                Linkedin
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card rounded" style="cursor: pointer">
                        <div class="card-body text-center">
                            <i class="fab fa-google-wallet fa-9x" aria-hidden="true"></i>
                            <h5 class="mt-2">
                                Google My Business
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card rounded" style="cursor: pointer">
                        <div class="card-body text-center">
                            <i class="fab fa-reddit fa-9x" aria-hidden="true"></i>
                            <h5 class="mt-2">
                                Reddit
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card rounded" style="cursor: pointer">
                        <div class="card-body text-center">
                            <i class="fab fa-telegram fa-9x" aria-hidden="true"></i>
                            <h5 class="mt-2">
                                Telegram
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card rounded" style="cursor: pointer">
                        <div class="card-body text-center">
                            <i class="fab fa-pinterest fa-9x" aria-hidden="true"></i>
                            <h5 class="mt-2">
                                Pinterest
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card rounded" style="cursor: pointer">
                        <div class="card-body text-center">
                            <i class="fab fa-youtube fa-9x" aria-hidden="true"></i>
                            <h5 class="mt-2">
                                YouTube
                            </h5>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>





@endsection
