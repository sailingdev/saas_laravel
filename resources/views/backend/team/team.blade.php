@extends('layouts.backend.app_backend')
@section('content')
    <div class="subheader {{Helper::class_main(1)}}">
        <div class="wrap">
            <div class="subheader-main wrap-m w-100 p-r-0">
                <div class="wrap-c">
                    <button type="button" class="btn btn-label-info m-r-10 subheader-toggle"><i class="fas fa-bars"></i>
                    </button>
                    <h3 class="title"><i class="fa fa-rocket text-info" style="color: #1ac958"></i> Team</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="content-two-column {{Helper::class_main(1)}}">
        <div class="column-two nicescroll" style="width: 100%; margin: 0">
            <div class="card rounded">
                <div class="card-header">
                    <div class="row">
                        <div class="input-group box-search-one col-md-3">
                            <input class="form-control search-input" type="text" autocomplete="off" placeholder="Search members">
                            <span class="input-group-append">
                                <button class="btn" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <div class="col-md-9">
                            <button class="btn btn-primary pull-right">Invite Team Member</button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row" style="border-bottom: #f5efef 1px solid">
                        <div class="col-md-3 font-weight-bold">Member</div>
                        <div class="col-md-3 font-weight-bold">Title</div>
                        <div class="col-md-3 font-weight-bold">Email</div>
                        <div class="col-md-3 font-weight-bold">Role</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-3">Johan Forsberg</div>
                        <div class="col-md-3">fsfs</div>
                        <div class="col-md-3">testgan2019@gmail.com</div>
                        <div class="col-md-3">Owner</div>
                    </div>
                </div>
            </div>




            <div class="card rounded mt-3">
                <div class="card-header">
                    <div class="card-title">
                        <h5>Role Privileges</h5>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row" style="border-bottom: #f5efef 1px solid">
                        <div class="col-md-4 font-weight-bold">Privilege</div>
                        <div class="col-md-2 font-weight-bold">Owner</div>
                        <div class="col-md-2 font-weight-bold">Approver</div>
                        <div class="col-md-2 font-weight-bold">Reviewer</div>
                        <div class="col-md-2 font-weight-bold">Editor</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4">Draft Posts</div>
                        <div class="col-md-2"><i class="fa fa-check text-info"></i></div>
                        <div class="col-md-2"><i class="fa fa-check text-info"></i></div>
                        <div class="col-md-2"><i class="fa fa-check text-info"></i></div>
                        <div class="col-md-2"></div>
                    </div>

                    <div class="row mt-2 pt-2" style="border-top: #f5efef 1px solid">
                        <div class="col-md-4">Review Posts</div>
                        <div class="col-md-2"><i class="fa fa-check text-info"></i></div>
                        <div class="col-md-2"><i class="fa fa-check text-info"></i></div>
                        <div class="col-md-2"><i class="fa fa-check text-info"></i></div>
                        <div class="col-md-2"><i class="fa fa-check text-info"></i></div>
                    </div>

                    <div class="row mt-2 pt-2" style="border-top: #f5efef 1px solid">
                        <div class="col-md-4">Approve Posts</div>
                        <div class="col-md-2"><i class="fa fa-check text-info"></i></div>
                        <div class="col-md-2"><i class="fa fa-check text-info"></i></div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2"></div>
                    </div>

                    <div class="row mt-2 pt-2" style="border-top: #f5efef 1px solid">
                        <div class="col-md-4">Create more Workspaces</div>
                        <div class="col-md-2"><i class="fa fa-check text-info"></i></div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2"></div>
                    </div>

                    <div class="row mt-2 pt-2" style="border-top: #f5efef 1px solid">
                        <div class="col-md-4">Invite Team members or Clients to Workspace</div>
                        <div class="col-md-2"><i class="fa fa-check text-info"></i></div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2"></div>
                    </div>

                    <div class="row mt-2 pt-2" style="border-top: #f5efef 1px solid">
                        <div class="col-md-4">View and manage Platforms</div>
                        <div class="col-md-2"><i class="fa fa-check text-info"></i></div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2"></div>
                    </div>

                    <div class="row mt-2 pt-2" style="border-top: #f5efef 1px solid">
                        <div class="col-md-4">Modify Approval Workflow process</div>
                        <div class="col-md-2"><i class="fa fa-check text-info"></i></div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2"></div>
                    </div>

                    <div class="row mt-2 pt-2" style="border-top: #f5efef 1px solid">
                        <div class="col-md-4">Remove Team Members</div>
                        <div class="col-md-2"><i class="fa fa-check text-info"></i></div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
