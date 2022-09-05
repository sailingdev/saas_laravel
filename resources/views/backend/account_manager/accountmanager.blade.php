@extends('layouts.backend.app_backend')
@section('content')
    <div class="subheader {{Helper::class_main(1)}}">
        <div class="wrap">
            <div class="subheader-main wrap-m w-100 p-r-0">
                <div class="wrap-c">
                    <button type="button" class="btn btn-label-info m-r-10 subheader-toggle"><i class="fas fa-bars"></i>
                    </button>
                    <h3 class="title"><i class="far fa-user-circle text-info" style="color: #1ac958"></i> Account manager</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="content-two-column account-manager">
        <div class="column-one nicescroll">
            <a href="{{url('facebook_profiles/oauth')}}" class="btn btn-social btn-block text-left">
                <i class="fab fa-facebook-square" style="color: #3b5998"></i>
                Add Facebook profile
            </a>
            <a href="{{url('facebook_pages/oauth')}}" class="btn btn-social btn-block text-left">
                <i class="fab fa-facebook-square" style="color: #3b5998"></i>
                Add Facebook page
            </a>
            <a href="{{url('facebook_groups/oauth')}}" class="btn btn-social btn-block text-left">
                <i class="fab fa-facebook-square" style="color: #3b5998"></i>
                Add Facebook group
            </a>
            <a href="{{url('instagram_profiles/oauth')}}" class="btn btn-social btn-block text-left">
                <i class="fab fa-instagram" style="color: #d62976"></i>
                Add Instagram profile
            </a>
            <a href="{{url('twitter_profiles/oauth')}}" class="btn btn-social btn-block text-left">
                <i class="fab fa-twitter" style="color: #00acee"></i>
                Add Twitter profile
            </a>
        </div>
        <div class="column-two nicescroll">
            <div class="row">
                <div class="col-md-4 col-sm-6 am_facebook_profiles">
                    <div class="card m-b-30">
                        <div class="card-header wrap-m">
                            <div class="card-title wrap-c m-b-0">
                                <i class="fab fa-facebook-square p-r-5" style="color: #3b5998"></i>
                                Facebook profiles
                            </div>
                        </div>
                        <div class="card-body widget-list check-wrap-all h-300 nicescroll p-0 no-update"
                             tabindex="3" style="overflow-y: hidden; outline: none;">
                            <div class="empty small"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 am_facebook_pages">
                    <div class="card m-b-30">
                        <div class="card-header wrap-m">
                            <div class="card-title wrap-c m-b-0">
                                <i class="fab fa-facebook-square p-r-5" style="color: #3b5998"></i>
                                Facebook pages
                            </div>
                        </div>
                        <div class="card-body widget-list check-wrap-all h-300 nicescroll p-0 no-update"
                             tabindex="4" style="overflow-y: hidden; outline: none;">
                            <div class="empty small"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 am_facebook_groups">
                    <div class="card m-b-30">
                        <div class="card-header wrap-m">
                            <div class="card-title wrap-c m-b-0">
                                <i class="fab fa-facebook-square p-r-5" style="color: #3b5998"></i>
                                Facebook groups
                            </div>
                        </div>
                        <div class="card-body widget-list check-wrap-all h-300 nicescroll p-0 no-update"
                             tabindex="5" style="overflow-y: hidden; outline: none;">
                            <div class="empty small"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 am_instagram_profiles">
                    <div class="card m-b-30">
                        <div class="card-header wrap-m">
                            <div class="card-title wrap-c m-b-0">
                                <i class="fab fa-instagram p-r-5" style="color: #d62976"></i>
                                Instagram profiles
                            </div>
                        </div>
                        <div class="card-body widget-list check-wrap-all h-300 nicescroll p-0 no-update"
                             tabindex="6" style="overflow-y: hidden; outline: none;">
                            <div class="empty small"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 am_twitter_profiles">
                    <div class="card m-b-30">
                        <div class="card-header wrap-m">
                            <div class="card-title wrap-c m-b-0">
                                <i class="fab fa-twitter p-r-5" style="color: #00acee"></i>
                                Twitter profiles
                            </div>
                        </div>
                        <div class="card-body widget-list check-wrap-all h-300 nicescroll p-0 no-update"
                             tabindex="7" style="overflow-y: hidden; outline: none;">
                            <div class="empty small"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="ascrail2002" class="nicescroll-rails nicescroll-rails-vr"
                 style="width: 5px; z-index: auto; cursor: default; position: absolute; top: 86px; left: 294.333px; height: 300px; display: none; opacity: 0;">
                <div class="nicescroll-cursors"
                     style="position: relative; top: 0px; float: right; width: 5px; height: 0px; background-color: rgb(215, 215, 215); border: none; background-clip: padding-box; border-radius: 0px;">
                </div>
            </div>
            <div id="ascrail2003" class="nicescroll-rails nicescroll-rails-vr"
                 style="width: 5px; z-index: auto; cursor: default; position: absolute; top: 86px; left: 599.666px; height: 300px; display: none;">
                <div class="nicescroll-cursors"
                     style="position: relative; top: 0px; float: right; width: 5px; height: 0px; background-color: rgb(215, 215, 215); border: none; background-clip: padding-box; border-radius: 0px;">
                </div>
            </div>
            <div id="ascrail2004" class="nicescroll-rails nicescroll-rails-vr"
                 style="width: 5px; z-index: auto; cursor: default; position: absolute; top: 86px; left: 905px; height: 300px; display: none;">
                <div class="nicescroll-cursors"
                     style="position: relative; top: 0px; float: right; width: 5px; height: 0px; background-color: rgb(215, 215, 215); border: none; background-clip: padding-box; border-radius: 0px;">
                </div>
            </div>
            <div id="ascrail2005" class="nicescroll-rails nicescroll-rails-vr"
                 style="width: 5px; z-index: auto; cursor: default; position: absolute; top: 478px; left: 294.333px; height: 300px; display: none;">
                <div class="nicescroll-cursors"
                     style="position: relative; top: 0px; float: right; width: 5px; height: 0px; background-color: rgb(215, 215, 215); border: none; background-clip: padding-box; border-radius: 0px;">
                </div>
            </div>
            <div id="ascrail2006" class="nicescroll-rails nicescroll-rails-vr"
                 style="width: 5px; z-index: auto; cursor: default; position: absolute; top: 478px; left: 599.666px; height: 300px; display: none;">
                <div class="nicescroll-cursors"
                     style="position: relative; top: 0px; float: right; width: 5px; height: 0px; background-color: rgb(215, 215, 215); border: none; background-clip: padding-box; border-radius: 0px;">
                </div>
            </div>
        </div>

    </div>

@endsection
