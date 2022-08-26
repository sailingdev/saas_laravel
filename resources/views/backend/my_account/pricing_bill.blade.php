@extends('layouts.backend.app_backend')
@section('specific_css')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
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
            background-color: rgba(85, 120, 235, 0.1) !important;
        }

        .menu-item > a{
            border-radius: 4px;
            padding: 9px;
        }

        .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20rem; }
        .toggle.ios .toggle-handle { border-radius: 20rem; }

        p i{
            color: #5766dc;
        }

    </style>
@endsection

@section('content')
    @include('backend.my_account.subheader')
    <div class="content-two-column {{Helper::class_main(1)}}">
        <div class="column-two nicescroll" style="width: 100%; margin: 0">
            <div>Manage your account</div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card rounded mt-2">
                        <div class="card-body">
                            <div class="font-weight-bold">
                                <span class="text-uppercase">Current plan:</span> Free($0/month)
                            </div>
                            <p class="mt-3"><i class="fa fa-check-circle color-red" aria-hidden="true"></i> Ultimated Users</p>
                            <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> You have used 1/1 workspaces</p>
                            <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> 10 Social Accounts</p>
                            <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> 50 Scheduled Posts</p>
                            <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> 2000 Al writer Char/month</p>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card rounded mt-2">
                        <div class="card-body">
                            <div class="font-weight-bold">
                                <span class="text-uppercase">ADD-ON</span>
                                <br>
                                <span class="text-uppercase">Al Writer Ultimated</span>
                                <br>
                                <br>
                            </div>
                            <p>$276/year</p>
                            <button class="btn btn-primary btn-block">Add to plan</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="mt-3">Upgrade your account</div>
            <div class="mt-1">
                Monthly
                <input type="checkbox" checked data-toggle="toggle" data-style="ios">
                Yearly (Save up to 30%)
            </div>


            <div class="row mt-4">
                <div class="col-12 col-md-4">
                    <div class="card rounded">
                        <div class="card-body">
                            <div class="text-center">
                                <h5>Free</h5>
                                <h5>$0/month</h5>
                                <p>Billed $0 every year</p>
                                <button class="btn btn-primary btn-sm">Upgrade Now</button>
                            </div>

                            <div class="mt-3">
                                <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> 1 Workspace</p>
                                <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> 10 Social Accounts</p>
                                <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> 20 Scheduled Posts(one-off)</p>
                                <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> Unlimited Team Members</p>
                                <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> Al Writer: 10k chars(one-time)</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card rounded">
                        <div class="card-body">
                            <div class="text-center">
                                <h5>Solo</h5>
                                <h5>$7/month</h5>
                                <p>Billed $84 every year</p>
                                <button class="btn btn-primary btn-sm">Upgrade Now</button>
                            </div>

                            <div class="mt-3">
                                <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> 1 Workspace</p>
                                <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> 10 Social Accounts</p>
                                <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> Unlimited Scheduled Posts</p>
                                <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> Unlimited Team Members</p>
                                <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> Al Writer: 20k chars/month</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-md-4">
                    <div class="card rounded">
                        <div class="card-body">
                            <div class="text-center">
                                <h5>Basic</h5>
                                <h5>$15/month</h5>
                                <p>Billed $180 every year</p>
                                <button class="btn btn-primary btn-sm">Upgrade Now</button>
                            </div>

                            <div class="mt-3">
                                <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> 5 Workspaces</p>
                                <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> 25 Social Accounts</p>
                                <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> Unlimited Scheduled Posts</p>
                                <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> Unlimited Team Members</p>
                                <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> Al Writer: 30k chars/month</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-4">
                <div class="col-12 col-md-4">
                    <div class="card rounded">
                        <div class="card-body">
                            <div class="text-center">
                                <h5>Starter</h5>
                                <h5>$23/month</h5>
                                <p>Billed $276 every year</p>
                                <button class="btn btn-primary btn-sm">Upgrade Now</button>
                            </div>

                            <div class="mt-3">
                                <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> 10 Workspaces</p>
                                <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> 50 Social Accounts</p>
                                <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> Unlimited Scheduled Posts(one-off)</p>
                                <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> Unlimited Team Members</p>
                                <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> Al Writer: 50k chars/month</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card rounded">
                        <div class="card-body">
                            <div class="text-center">
                                <h5>Growth</h5>
                                <h5>$79/month</h5>
                                <p>Billed $948 every year</p>
                                <button class="btn btn-primary btn-sm">Upgrade Now</button>
                            </div>

                            <div class="mt-3">
                                <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> 50 Workspaces</p>
                                <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> 200 Social Accounts</p>
                                <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> Unlimited Scheduled Posts(one-off)</p>
                                <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> Unlimited Team Members</p>
                                <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> Al Writer: Unlimited chars/month</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-md-4">
                    <div class="card rounded">
                        <div class="card-body">
                            <div class="text-center">
                                <h5>Agency</h5>
                                <h5>$399/month</h5>
                                <p>Billed $4788 every year</p>
                                <button class="btn btn-primary btn-sm">Upgrade Now</button>
                            </div>

                            <div class="mt-3">
                                <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> 200 Workspaces</p>
                                <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> Unlimited Social Accounts</p>
                                <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> Unlimited Scheduled Posts(one-off)</p>
                                <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> Unlimited Team Members</p>
                                <p><i class="fa fa-check-circle color-red" aria-hidden="true"></i> Al Writer: Unlimited chars/month</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('specific_js')
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
@endsection
