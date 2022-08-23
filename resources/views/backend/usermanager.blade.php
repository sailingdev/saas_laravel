@extends('layouts.backend.app_backend')
@section('content')
    <div class="subheader {{Helper::class_main(1)}}">
        <div class="wrap">
            <div class="subheader-main wrap-m w-100 p-r-0">
                <div class="wrap-c">
                    <button type="button" class="btn btn-label-info m-r-10 subheader-toggle"><i class="fas fa-bars"></i>
                    </button>
                    <h3 class="title"><i class="far fa-user text-info" style="color: #1ac958"></i> User manager</h3>
                </div>
            </div>
        </div>
    </div>



    <div class="content-two-column {{Helper::class_main(1)}}">
        <div class="column-one nicescroll">
            <div class="input-group box-search-one">
                <input class="form-control search-input" type="text" autocomplete="true" placeholder="Search">
                <span class="input-group-append">
                        <button class="btn" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
            </div>

            <div class="widget">
                <div class="widget-items search-list">
                    <div class="item widget-item search-item active">
                        <a href="{{url('user_manager/index')}}" class="actionItem" data-result="html"
                           data-content="column-two" data-history="{{url('user_manager/index')}}">
                                <span class="widget-section">
                                    <span class="widget-icon"><i class="far fa-user"></i></span>
                                    <span class="widget-desc">List users</span>
                                </span>
                        </a>
                    </div>
                    <div class="item widget-item search-item">
                        <a href="{{url('user_manager/report')}}" class="actionItem" data-result="html"
                           data-content="column-two" data-history="{{url('user_manager/report')}}">
                                <span class="widget-section">
                                    <span class="widget-icon"><i class="far fa-chart-bar"></i></span>
                                    <span class="widget-desc">User report</span>
                                </span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <div class="column-two nicescroll">

            <form class="" action="http://localhost/laterl.io/user_manager">
                <div class="subheadline wrap-m">
                    <div class="sh-main wrap-c">
                        <div class="sh-title text-info fs-18 fw-5"><i class="far fa-user"></i> List users</div>
                    </div>
                    <div class="sh-toolbar wrap-c">
                        <div class="input-group box-search-one">
                            <input type="text" class="form-control" name="k" placeholder="Search" value="">
                            <div class="input-group-append" id="button-addon4">
                                <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                                <a class="btn btn-label-info actionItem" data-result="html" data-content="column-two"
                                   data-history="{{url('user_manager/index/update')}}"
                                   href="{{url('user_manager/index/update')}}"
                                   data-call-after="Core.date();">
                                    <i class="fas fa-plus"></i> Add new </a>
                                <a class="btn btn-label-danger actionMultiItem"
                                   href="{{url('user_manager/delete')}}"
                                   data-confirm="Are you sure to delete this items?"
                                   data-redirect="{{url('user_manager/?')}}"><i
                                        class="far fa-trash-alt"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="m-t-50 table-mod table-responsive">

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">
                                <label class="i-checkbox i-checkbox--tick i-checkbox--brand">
                                    <input type="checkbox" class="check-all">
                                    <span></span>
                                </label>
                            </th>
                            <th scope="col"></th>
                            <th scope="col" colspan="2">
                                <a href="{{url('user_manager/?c=1&t=asc')}}">Basic info</a>
                                <span class="sort-caret ">
	                		<i class="asc fas fa-sort-up" aria-hidden="true"></i>
	                		<i class="desc fas fa-sort-down" aria-hidden="true"></i>
	                	</span>
                            </th>
                            <th scope="col">
                                <a href="{{url('user_manager/?c=2&t=asc')}}">Package</a>
                                <span class="sort-caret ">
	                		<i class="asc fas fa-sort-up" aria-hidden="true"></i>
	                		<i class="desc fas fa-sort-down" aria-hidden="true"></i>
	                	</span>
                            </th>
                            <th scope="col">
                                <a href="{{url('user_manager/?c=3&t=asc')}}">Expiration date</a>
                                <span class="sort-caret ">
	                		<i class="asc fas fa-sort-up" aria-hidden="true"></i>
	                		<i class="desc fas fa-sort-down" aria-hidden="true"></i>
	                	</span>
                            </th>
                            <th scope="col">
                                <a href="{{url('user_manager/?c=4&t=asc')}}">Login type</a>
                                <span class="sort-caret ">
	                		<i class="asc fas fa-sort-up" aria-hidden="true"></i>
	                		<i class="desc fas fa-sort-down" aria-hidden="true"></i>
	                	</span>
                            </th>
                            <th scope="col">
                                <a href="{{url('user_manager/?c=5&t=asc')}}">Status</a>
                                <span class="sort-caret ">
	                		<i class="asc fas fa-sort-up" aria-hidden="true"></i>
	                		<i class="desc fas fa-sort-down" aria-hidden="true"></i>
	                	</span>
                            </th>
                            <th scope="col">
                                <a href="{{url('user_manager/?c=6&t=asc')}}">Changed</a>
                                <span class="sort-caret ">
	                		<i class="asc fas fa-sort-up" aria-hidden="true"></i>
	                		<i class="desc fas fa-sort-down" aria-hidden="true"></i>
	                	</span>
                            </th>
                            <th scope="col">
                                <a href="{{url('user_manager/?c=7&t=asc')}}">Created</a>
                                <span class="sort-caret ">
	                		<i class="asc fas fa-sort-up" aria-hidden="true"></i>
	                		<i class="desc fas fa-sort-down" aria-hidden="true"></i>
	                	</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr class="item">
                            <td scope="row">
                                <label class="i-checkbox i-checkbox--tick i-checkbox--brand">
                                    <input type="checkbox" class="check-item" name="id[]"
                                           value="25b9951c02a60757b64eea540e66a2eb">
                                    <span></span>
                                </label>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-anim">
                                        <a class="dropdown-item actionItem" data-result="html" data-content="column-two"
                                           href="{{url('user_manager/index/update/25b9951c02a60757b64eea540e66a2eb')}}"
                                           data-history="{{url('user_manager/index/update/25b9951c02a60757b64eea540e66a2eb')}}"
                                           data-call-after="Core.date();"><i class="far fa-edit"></i> Edit</a>
                                        <a class="dropdown-item actionItem"
                                           href="{{url('user_manager/view/25b9951c02a60757b64eea540e66a2eb')}}"
                                           data-redirect="{{url('dashboard')}}"><i
                                                class="far fa-eye"></i> View as user</a>
                                        <a class="dropdown-item actionItem"
                                           href="{{url('user_manager/delete/25b9951c02a60757b64eea540e66a2eb')}}"
                                           data-id="25b9951c02a60757b64eea540e66a2eb"
                                           data-confirm="Are you sure to delete this items?" data-remove="item"><i
                                           class="far fa-trash-alt"></i> Delete</a>
                                    </div>
                                </div>

                            </td>
                            <td class="avatar"><img
                                    src="https://ui-avatars.com/api/?name=Testing&background=5578eb&color=fff&font-size=0.5&rounded=true">
                            </td>
                            <td>
                                <span class="fw-5 text-info">Testing</span><br>
                                lovekite612@outlook.com
                            </td>
                            <td>test</td>
                            <td>29-08-2022</td>
                            <td><span class="badge badge-info"><i class="fas fa-user-plus"></i> Direct</span></td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td>15/08/2022 4:51 PM</td>
                            <td>15/08/2022 4:51 PM</td>
                        </tr>
                        <tr class="spacer"></tr>
                        <tr class="item">
                            <td scope="row">
                                <label class="i-checkbox i-checkbox--tick i-checkbox--brand">
                                    <input type="checkbox" class="check-item" name="id[]"
                                           value="57ec6ebd7a2dd28441d69ab55089f01d">
                                    <span></span>
                                </label>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i
                                            class="fas fa-ellipsis-h"></i></button>
                                    <div class="dropdown-menu dropdown-menu-anim">
                                        <a class="dropdown-item actionItem" data-result="html" data-content="column-two"
                                           href="{{url('user_manager/index/update/57ec6ebd7a2dd28441d69ab55089f01d')}}"
                                           data-history="{{url('user_manager/index/update/57ec6ebd7a2dd28441d69ab55089f01d')}}"
                                           data-call-after="Core.date();"><i class="far fa-edit"></i> Edit</a>
                                        <a class="dropdown-item actionItem"
                                           href="{{url('user_manager/view/57ec6ebd7a2dd28441d69ab55089f01d')}}"
                                           data-redirect="{{url('dashboard')}}"><i
                                                class="far fa-eye"></i> View as user</a>
                                        <a class="dropdown-item actionItem"
                                           href="{{url('user_manager/delete/57ec6ebd7a2dd28441d69ab55089f01d')}}"
                                           data-id="57ec6ebd7a2dd28441d69ab55089f01d"
                                           data-confirm="Are you sure to delete this items?" data-remove="item"><i
                                                class="far fa-trash-alt"></i> Delete</a>
                                    </div>
                                </div>

                            </td>
                            <td class="avatar"><img
                                    src="https://ui-avatars.com/api/?name=dev test&background=5578eb&color=fff&font-size=0.5&rounded=true">
                            </td>
                            <td>
                                <span class="fw-5 text-info">dev test</span><br>
                                test4@mailinator.com
                            </td>
                            <td>test</td>
                            <td>16-08-2022</td>
                            <td><span class="badge badge-info"><i class="fas fa-user-plus"></i> Direct</span></td>
                            <td><span class="badge badge-dark">Inactive</span></td>
                            <td>02/08/2022 11:10 AM</td>
                            <td>02/08/2022 11:10 AM</td>
                        </tr>
                        <tr class="spacer"></tr>
                        <tr class="item">
                            <td scope="row">
                                <label class="i-checkbox i-checkbox--tick i-checkbox--brand">
                                    <input type="checkbox" class="check-item" name="id[]"
                                           value="063faf5e2215ae00ee2789c9cf6b9b4c">
                                    <span></span>
                                </label>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i
                                            class="fas fa-ellipsis-h"></i></button>
                                    <div class="dropdown-menu dropdown-menu-anim">
                                        <a class="dropdown-item actionItem" data-result="html" data-content="column-two"
                                           href="{{url('user_manager/index/update/063faf5e2215ae00ee2789c9cf6b9b4c')}}"
                                           data-history="{{url('user_manager/index/update/063faf5e2215ae00ee2789c9cf6b9b4c')}}"
                                           data-call-after="Core.date();"><i class="far fa-edit"></i> Edit</a>
                                        <a class="dropdown-item actionItem"
                                           href="{{url('user_manager/view/063faf5e2215ae00ee2789c9cf6b9b4c')}}"
                                           data-redirect="{{url('dashboard')}}"><i
                                                class="far fa-eye"></i> View as user</a>
                                        <a class="dropdown-item actionItem"
                                           href="{{url('user_manager/delete/063faf5e2215ae00ee2789c9cf6b9b4c')}}"
                                           data-id="063faf5e2215ae00ee2789c9cf6b9b4c"
                                           data-confirm="Are you sure to delete this items?" data-remove="item"><i
                                                class="far fa-trash-alt"></i> Delete</a>
                                    </div>
                                </div>

                            </td>
                            <td class="avatar"><img
                                    src="https://ui-avatars.com/api/?name=devtest1&background=5578eb&color=fff&font-size=0.5&rounded=true">
                            </td>
                            <td>
                                <span class="fw-5 text-info">devtest1</span><br>
                                dev.test@mailinator.com
                            </td>
                            <td>test</td>
                            <td>16-08-2022</td>
                            <td><span class="badge badge-info"><i class="fas fa-user-plus"></i> Direct</span></td>
                            <td><span class="badge badge-dark">Inactive</span></td>
                            <td>02/08/2022 10:17 AM</td>
                            <td>02/08/2022 10:17 AM</td>
                        </tr>
                        <tr class="spacer"></tr>
                        <tr class="item">
                            <td scope="row">
                                <label class="i-checkbox i-checkbox--tick i-checkbox--brand">
                                    <input type="checkbox" class="check-item" name="id[]"
                                           value="80061d0ad015bccc281967caa00fdf0e">
                                    <span></span>
                                </label>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i
                                            class="fas fa-ellipsis-h"></i></button>
                                    <div class="dropdown-menu dropdown-menu-anim">
                                        <a class="dropdown-item actionItem" data-result="html" data-content="column-two"
                                           href="{{url('user_manager/index/update/80061d0ad015bccc281967caa00fdf0e')}}"
                                           data-history="{{url('user_manager/index/update/80061d0ad015bccc281967caa00fdf0e')}}"
                                           data-call-after="Core.date();"><i class="far fa-edit"></i> Edit</a>
                                        <a class="dropdown-item actionItem"
                                           href="{{url('user_manager/view/80061d0ad015bccc281967caa00fdf0e')}}"
                                           data-redirect="{{url('dashboard')}}"><i
                                                class="far fa-eye"></i> View as user</a>
                                        <a class="dropdown-item actionItem"
                                           href="{{url('user_manager/delete/80061d0ad015bccc281967caa00fdf0e')}}"
                                           data-id="80061d0ad015bccc281967caa00fdf0e"
                                           data-confirm="Are you sure to delete this items?" data-remove="item"><i
                                                class="far fa-trash-alt"></i> Delete</a>
                                    </div>
                                </div>

                            </td>
                            <td class="avatar"><img
                                    src="https://ui-avatars.com/api/?name=Mitesh Lathiya&background=5578eb&color=fff&font-size=0.5&rounded=true">
                            </td>
                            <td>
                                <span class="fw-5 text-info">Mitesh Lathiya</span><br>
                                mitesh.l@evolutioncloud.in
                            </td>
                            <td>test</td>
                            <td>10-08-2022</td>
                            <td><span class="badge badge-google"><i class="fab fa-google"></i> Google</span></td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td>27/07/2022 12:34 PM</td>
                            <td>27/07/2022 12:34 PM</td>
                        </tr>
                        <tr class="spacer"></tr>
                        <tr class="item">
                            <td scope="row">
                                <label class="i-checkbox i-checkbox--tick i-checkbox--brand">
                                    <input type="checkbox" class="check-item" name="id[]"
                                           value="b4b17cd93589b5b4d05a6ebb32c9ee86">
                                    <span></span>
                                </label>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i
                                            class="fas fa-ellipsis-h"></i></button>
                                    <div class="dropdown-menu dropdown-menu-anim">
                                        <a class="dropdown-item actionItem" data-result="html" data-content="column-two"
                                           href="{{url('user_manager/index/update/b4b17cd93589b5b4d05a6ebb32c9ee86')}}"
                                           data-history="{{url('user_manager/index/update/b4b17cd93589b5b4d05a6ebb32c9ee86')}}"
                                           data-call-after="Core.date();"><i class="far fa-edit"></i> Edit</a>
                                        <a class="dropdown-item actionItem"
                                           href="{{url('user_manager/view/b4b17cd93589b5b4d05a6ebb32c9ee86')}}"
                                           data-redirect="{{url('dashboard')}}"><i
                                                class="far fa-eye"></i> View as user</a>
                                        <a class="dropdown-item actionItem"
                                           href="{{url('user_manager/delete/b4b17cd93589b5b4d05a6ebb32c9ee86')}}"
                                           data-id="b4b17cd93589b5b4d05a6ebb32c9ee86"
                                           data-confirm="Are you sure to delete this items?" data-remove="item"><i
                                                class="far fa-trash-alt"></i> Delete</a>
                                    </div>
                                </div>

                            </td>
                            <td class="avatar"><img
                                    src="https://ui-avatars.com/api/?name=Pratik Mathukiya&background=5578eb&color=fff&font-size=0.5&rounded=true">
                            </td>
                            <td>
                                <span class="fw-5 text-info">Pratik Mathukiya</span><br>
                                pratik.m@evolutioncloud.in
                            </td>
                            <td>test</td>
                            <td>09-08-2022</td>
                            <td><span class="badge badge-google"><i class="fab fa-google"></i> Google</span></td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td>26/07/2022 11:36 AM</td>
                            <td>26/07/2022 11:36 AM</td>
                        </tr>
                        <tr class="spacer"></tr>
                        <tr class="item">
                            <td scope="row">
                                <label class="i-checkbox i-checkbox--tick i-checkbox--brand">
                                    <input type="checkbox" class="check-item" name="id[]"
                                           value="49dc6ffda4a9812f2a67735db3d50419">
                                    <span></span>
                                </label>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i
                                            class="fas fa-ellipsis-h"></i></button>
                                    <div class="dropdown-menu dropdown-menu-anim">
                                        <a class="dropdown-item actionItem" data-result="html" data-content="column-two"
                                           href="{{url('user_manager/index/update/49dc6ffda4a9812f2a67735db3d50419')}}"
                                           data-history="{{url('user_manager/index/update/49dc6ffda4a9812f2a67735db3d50419')}}"
                                           data-call-after="Core.date();"><i class="far fa-edit"></i> Edit</a>
                                        <a class="dropdown-item actionItem"
                                           href="{{url('user_manager/view/49dc6ffda4a9812f2a67735db3d50419')}}"
                                           data-redirect="{{url('dashboard')}}"><i
                                                class="far fa-eye"></i> View as user</a>
                                        <a class="dropdown-item actionItem"
                                           href="{{url('user_manager/delete/49dc6ffda4a9812f2a67735db3d50419')}}"
                                           data-id="49dc6ffda4a9812f2a67735db3d50419"
                                           data-confirm="Are you sure to delete this items?" data-remove="item"><i
                                                class="far fa-trash-alt"></i> Delete</a>
                                    </div>
                                </div>

                            </td>
                            <td class="avatar"><img
                                    src="https://ui-avatars.com/api/?name=Johan Forsberg&background=5578eb&color=fff&font-size=0.5&rounded=true">
                            </td>
                            <td>
                                <span class="fw-5 text-info">Johan Forsberg</span><br>
                                testgan2019@gmail.com
                            </td>
                            <td>test</td>
                            <td>09-08-2022</td>
                            <td><span class="badge badge-facebook"><i class="fab fa-facebook-f"></i> Facebook</span>
                            </td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td>26/07/2022 11:11 AM</td>
                            <td>26/07/2022 11:11 AM</td>
                        </tr>
                        <tr class="spacer"></tr>
                        <tr class="item">
                            <td scope="row">
                                <label class="i-checkbox i-checkbox--tick i-checkbox--brand">
                                    <input type="checkbox" class="check-item" name="id[]"
                                           value="d0d7942201378e4dc7dd1070053a3f32">
                                    <span></span>
                                </label>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i
                                            class="fas fa-ellipsis-h"></i></button>
                                    <div class="dropdown-menu dropdown-menu-anim">
                                        <a class="dropdown-item actionItem" data-result="html" data-content="column-two"
                                           href="{{url('user_manager/index/update/d0d7942201378e4dc7dd1070053a3f32')}}"
                                           data-history="{{url('user_manager/index/update/d0d7942201378e4dc7dd1070053a3f32')}}"
                                           data-call-after="Core.date();"><i class="far fa-edit"></i> Edit</a>
                                        <a class="dropdown-item actionItem"
                                           href="{{url('user_manager/view/d0d7942201378e4dc7dd1070053a3f32')}}"
                                           data-redirect="{{url('dashboard')}}"><i
                                                class="far fa-eye"></i> View as user</a>
                                        <a class="dropdown-item actionItem"
                                           href="{{url('user_manager/delete/d0d7942201378e4dc7dd1070053a3f32')}}"
                                           data-id="d0d7942201378e4dc7dd1070053a3f32"
                                           data-confirm="Are you sure to delete this items?" data-remove="item"><i
                                                class="far fa-trash-alt"></i> Delete</a>
                                    </div>
                                </div>

                            </td>
                            <td class="avatar"><img
                                    src="https://ui-avatars.com/api/?name=Admin Panel&background=5578eb&color=fff&font-size=0.5&rounded=true">
                            </td>
                            <td>
                                <span class="fw-5 text-info">Admin Panel</span><br>
                                admin@mail.com
                            </td>
                            <td>Telecom Service</td>
                            <td>03-05-2023</td>
                            <td><span class="badge badge-info"><i class="fas fa-user-plus"></i> Direct</span></td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td>07/07/2022 3:15 PM</td>
                            <td>10/04/2020 3:12 PM</td>
                        </tr>
                        <tr class="spacer"></tr>
                        <tr class="item">
                            <td scope="row">
                                <label class="i-checkbox i-checkbox--tick i-checkbox--brand">
                                    <input type="checkbox" class="check-item" name="id[]" value="">
                                    <span></span>
                                </label>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i
                                            class="fas fa-ellipsis-h"></i></button>
                                    <div class="dropdown-menu dropdown-menu-anim">
                                        <a class="dropdown-item actionItem" data-result="html" data-content="column-two"
                                           href="{{url('user_manager/index/update/')}}"
                                           data-history="{{url('user_manager/index/update/')}}"
                                           data-call-after="Core.date();"><i class="far fa-edit"></i> Edit</a>
                                        <a class="dropdown-item actionItem"
                                           href="{{url('user_manager/view/')}}"
                                           data-redirect="{{url('dashboard')}}"><i
                                                class="far fa-eye"></i> View as user</a>
                                        <a class="dropdown-item actionItem"
                                           href="http://localhost/laterl.io/user_manager/delete/" data-id=""
                                           data-confirm="Are you sure to delete this items?" data-remove="item"><i
                                                class="far fa-trash-alt"></i> Delete</a>
                                    </div>
                                </div>

                            </td>
                            <td class="avatar"><img
                                    src="https://ui-avatars.com/api/?name=Alert Bang&background=5578eb&color=fff&font-size=0.5&rounded=true">
                            </td>
                            <td>
                                <span class="fw-5 text-info">User Clive</span><br>
                                clive@gmail.com
                            </td>
                            <td></td>
                            <td></td>
                            <td><span class="badge badge-info"><i class="fas fa-user-plus"></i> Direct</span></td>
                            <td><span class="badge badge-danger">Banned</span></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="spacer"></tr>
                        <tr class="item">
                            <td scope="row">
                                <label class="i-checkbox i-checkbox--tick i-checkbox--brand">
                                    <input type="checkbox" class="check-item" name="id[]" value="">
                                    <span></span>
                                </label>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i
                                            class="fas fa-ellipsis-h"></i></button>
                                    <div class="dropdown-menu dropdown-menu-anim">
                                        <a class="dropdown-item actionItem" data-result="html" data-content="column-two"
                                           href="{{url('user_manager/index/update/')}}"
                                           data-history="{{url('user_manager/index/update/')}}"
                                           data-call-after="Core.date();"><i class="far fa-edit"></i> Edit</a>
                                        <a class="dropdown-item actionItem"
                                           href="{{url('user_manager/view/')}}"
                                           data-redirect="{{url('dashboard')}}"><i
                                                class="far fa-eye"></i> View as user</a>
                                        <a class="dropdown-item actionItem"
                                           href="http://localhost/laterl.io/user_manager/delete/" data-id=""
                                           data-confirm="Are you sure to delete this items?" data-remove="item"><i
                                                class="far fa-trash-alt"></i> Delete</a>
                                    </div>
                                </div>

                            </td>
                            <td class="avatar"><img
                                    src="https://ui-avatars.com/api/?name=wanda wang&background=5578eb&color=fff&font-size=0.5&rounded=true">
                            </td>
                            <td>
                                <span class="fw-5 text-info">James Hammond</span><br>
                                jhammond@gmail.com
                            </td>
                            <td></td>
                            <td></td>
                            <td><span class="badge badge-info"><i class="fas fa-user-plus"></i> Direct</span></td>
                            <td><span class="badge badge-danger">Banned</span></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="spacer"></tr>

                        </tbody>
                    </table>

                </div>

            </form>

            <nav class="m-t-30">
            </nav>
        </div>
    </div>

@endsection
