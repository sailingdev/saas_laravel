@extends('layouts.backend.app_backend')
@section('content')
    <div class="subheader {{Helper::class_main(1)}}">
        <div class="wrap">
            <div class="subheader-main wrap-m w-100 p-r-0">
                <div class="wrap-c">
                    <button type="button" class="btn btn-label-info m-r-10 subheader-toggle"><i class="fas fa-bars"></i>
                    </button>
                    <h3 class="title"><i class="fab fa-instagram text-info" style="color: #1ac958"></i> Instagram Post
                    </h3>
                </div>
            </div>
        </div>
    </div>


    <div class="content-three-column {{Helper::class_main(1)}}">
        <div class="column-one nicescroll">
            <div class="input-group box-search-one">
                <input class="form-control search-input" type="text" autocomplete="off" placeholder="Search">
                <span class="input-group-append">
                    <button class="btn" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                    <a class="btn btn-label-info">
                        <label class="i-checkbox i-checkbox--brand">
                            <input type="checkbox" name="id[]" class="check-all">
                            <span></span>
                        </label>
                    </a>
                </span>
            </div>

            <div class="widget">
                <div class="widget-list search-list">
                    <div class="empty small"></div>
                    <div class="text-center">
                        <a class="btn btn-info" href="{{url('account_manager')}}">
                            <i class="fas fa-plus-square"></i> Add account
                        </a>
                    </div>
                </div>

            </div>
        </div>


        <div class="comlumn-three-main">
            <div class="column-two nicescroll">
                    <div class="post post-create">
                        <div class="post-overplay"><div class="loader loader1"><div><div><div><div></div></div></div></div></div></div>
                        <div class="headline m-b-25">
                            <div class="title fs-16 text-info"><i class="far fa-edit"></i> New post</div>
                        </div>
                        <div class="row lg post-type m-b-15">
                            <div class="item col p-l-0 p-r-0 active">
                                <a href="javascript:void(0);">
                                    <label class="i-radio i-radio--tick i-radio--brand m-b-0 p-l-0">
                                        <input type="radio" name="post_type" checked="" value="media"> <i class="fas fa-photo-video"></i> Media					<span class="d-none"></span>
                                    </label>
                                </a>
                            </div>
                            <div class="item col p-l-0 p-r-0 ">
                                <a href="javascript:void(0);">
                                    <label class="i-radio i-radio--tick i-radio--brand m-b-0 p-l-0">
                                        <input type="radio" name="post_type" value="story"> <i class="far fa-image"></i> Story					<span class="d-none"></span>
                                    </label>
                                </a>
                            </div>
                            <div class="item col p-l-0 p-r-0 ">
                                <a href="javascript:void(0);">
                                    <label class="i-radio i-radio--tick i-radio--brand m-b-0 p-l-0">
                                        <input type="radio" name="post_type" value="igtv"> <i class="fas fa-tv"></i> IGTV					<span class="d-none"></span>
                                    </label>
                                </a>
                            </div>
                            <div class="item col p-l-0 p-r-0 ">
                                <a href="javascript:void(0);">
                                    <label class="i-radio i-radio--tick i-radio--brand m-b-0 p-l-0">
                                        <input type="radio" name="post_type" value="carousel"> <i class="fas fa-layer-group"></i> Carousel					<span class="d-none"></span>
                                    </label>
                                </a>
                            </div>
                        </div>
                        <div class="post-content m-b-15">
                            <div class="item-post-type" data-type="media" style="">
                                <div class="file-manager">
                                    <div class="fm-wiget">
                                        <div class="fm-progress-bar"></div>
                                        <div class="fm-files sortable ui-sortable"></div>
                                        <div class="fm-toolbar">
                                            <div class="btn-group btn-group-sm" role="group">
                                                <button type="button" class="btn btn-secondary btnOpenFileManager" data-select="single" data-file-type="all"><i class="far fa-folder-open"></i> File manager</button>
                                                <button type="button" class="btn btn-secondary fileinput-button" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="Upload"><i class="fas fa-upload"></i><input id="upload_media" type="file" name="files[]" multiple=""></button>
                                                <button type="button" class="btn btn-secondary btn-google-drive" id="btn-google-drive" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="Google Drive"><i class="fab fa-google-drive"></i></button>
                                                <button type="button" class="btn btn-secondary btn-dropbox" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="Dropbox"><i class="fab fa-dropbox"></i></button>
                                                <button type="button" class="btn btn-secondary btn-onedrive" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="OneDrive"><i class="fas fa-cloud"></i></button>
                                                <button type="button" class="btn btn-secondary btn-upload-from-url" data-text="Enter media url"><i class="fas fa-link"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item-post-type" data-type="story" style="display: none;">
                                <div class="file-manager">
                                    <div class="fm-wiget">
                                        <div class="fm-progress-bar"></div>
                                        <div class="fm-files sortable ui-sortable"></div>
                                        <div class="fm-toolbar">
                                            <div class="btn-group btn-group-sm" role="group">
                                                <button type="button" class="btn btn-secondary btnOpenFileManager" data-select="single" data-file-type="all"><i class="far fa-folder-open"></i> File manager</button>
                                                <button type="button" class="btn btn-secondary fileinput-button" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="Upload"><i class="fas fa-upload"></i><input id="upload_story" type="file" name="files[]" multiple=""></button>
                                                <button type="button" class="btn btn-secondary btn-google-drive" id="btn-google-drive" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="Google Drive"><i class="fab fa-google-drive"></i></button>
                                                <button type="button" class="btn btn-secondary btn-dropbox" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="Dropbox"><i class="fab fa-dropbox"></i></button>
                                                <button type="button" class="btn btn-secondary btn-onedrive" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="OneDrive"><i class="fas fa-cloud"></i></button>
                                                <button type="button" class="btn btn-secondary btn-upload-from-url" data-text="Enter media url"><i class="fas fa-link"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item-post-type" data-type="igtv" style="display: none;">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="advance[title]" placeholder="Enter your title">
                                </div>
                                <div class="file-manager">
                                    <div class="fm-wiget">
                                        <div class="fm-progress-bar"></div>
                                        <div class="fm-files sortable ui-sortable"></div>
                                        <div class="fm-toolbar">
                                            <div class="btn-group btn-group-sm" role="group">
                                                <button type="button" class="btn btn-secondary btnOpenFileManager" data-select="single" data-file-type="video"><i class="far fa-folder-open"></i> File manager</button>
                                                <button type="button" class="btn btn-secondary fileinput-button" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="Upload"><i class="fas fa-upload"></i><input id="upload_igtv" type="file" name="files[]" multiple=""></button>
                                                <button type="button" class="btn btn-secondary btn-google-drive" id="btn-google-drive" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="Google Drive"><i class="fab fa-google-drive"></i></button>
                                                <button type="button" class="btn btn-secondary btn-dropbox" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="Dropbox"><i class="fab fa-dropbox"></i></button>
                                                <button type="button" class="btn btn-secondary btn-onedrive" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="OneDrive"><i class="fas fa-cloud"></i></button>
                                                <button type="button" class="btn btn-secondary btn-upload-from-url" data-text="Enter media url"><i class="fas fa-link"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item-post-type  m-t-15" data-type="carousel" style="display: none;">
                                <div class="file-manager">
                                    <div class="fm-wiget">
                                        <div class="fm-progress-bar"></div>
                                        <div class="fm-files sortable ui-sortable"></div>
                                        <div class="fm-toolbar">
                                            <div class="btn-group btn-group-sm" role="group">
                                                <button type="button" class="btn btn-secondary btnOpenFileManager" data-select="multi" data-file-type="all"><i class="far fa-folder-open"></i> File manager</button>
                                                <button type="button" class="btn btn-secondary fileinput-button" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="Upload"><i class="fas fa-upload"></i><input id="upload_carousel" type="file" name="files[]" multiple=""></button>
                                                <button type="button" class="btn btn-secondary btn-google-drive" id="btn-google-drive" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="Google Drive"><i class="fab fa-google-drive"></i></button>
                                                <button type="button" class="btn btn-secondary btn-dropbox" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="Dropbox"><i class="fab fa-dropbox"></i></button>
                                                <button type="button" class="btn btn-secondary btn-onedrive" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="OneDrive"><i class="fas fa-cloud"></i></button>
                                                <button type="button" class="btn btn-secondary btn-upload-from-url" data-text="Enter media url"><i class="fas fa-link"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="instagram-post-caption-box">
                                <div class="caption m-t-15">
                                    <textarea name="caption" class="form-control post-message" placeholder="Enter your caption"></textarea>
                                    <div class="caption-toolbar">
                                        <div class="item">
                                            <div class="count-word"><i class="fas fa-text-width"></i> <span>0</span></div>
                                        </div>
                                        <a href="javascript:void(0);" class="item get-caption" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="Get caption"><i class="far fa-list-alt"></i></a><a href="javascript:void(0);" class="item save-caption" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="Save caption"><i class="far fa-save"></i></a></div>
                                </div>
                            </div>

                            <div class="post-advance m-t-15">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#"><i class="fas fa-magic text-info"></i> Advance option <span class="arrow"><i class="ft-chevron-down"></i></span></a>
                                    </li>
                                </ul>
                                <div class="advance-content">
                                    <div class="alert alert-solid-brand" role="alert">
                                        Advance options just support for Instagram accounts login by medthod: Username and Password</div>
                                    <div class="form-group widget-location">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                            </span>
                                            <input class="form-control search-location" data-action="{{url('instagram_post/location')}}" data-hide-overplay="false" data-result="html" data-content="load-location" type="text" autocomplete="off" placeholder="Enter location">
                                        </div>
                                        <div class="small loading">Searching...</div>
                                        <div class="load-location"></div>
                                    </div>

                                    <div class="caption m-t-15 m-b-15">
                                        <textarea name="advance[comment]" class="form-control post-comment" placeholder="Add a first comment on your post"></textarea>
                                        <div class="caption-toolbar">
                                            <div class="item">
                                                <div class="count-word"><i class="fas fa-text-width"></i> <span>0</span></div>
                                            </div>
                                            <a href="javascript:void(0);" class="item get-caption" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="Get caption"><i class="far fa-list-alt"></i></a><a href="javascript:void(0);" class="item save-caption" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="Save caption"><i class="far fa-save"></i></a></div>
                                    </div>

                                    <div class="item-post-type" data-type="story" style="display: none;">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-link"></i></span>
                                                </span>
                                                <input class="form-control" type="text" name="advance[link_story]" placeholder="Enter link for story">
                                            </div>
                                        </div>
                                        <label class="i-checkbox i-checkbox--tick i-checkbox--brand m-b-15">
                                            <input type="checkbox" name="advance[close_friends_story]" value="1">Close friends story						<span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="post-schedule m-b-15 ">
                            <label class="i-checkbox i-checkbox--tick i-checkbox--brand m-b-15">
                                <input type="checkbox" name="is_schedule" value="1"> Schedule		<span></span>
                            </label>

                            <div class="post-schedule-content">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Time post</label>
                                            <input type="text" class="form-control datetime hasDatepicker" autocomplete="off" name="time_post" value="" id="dp1661307237712">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Interval per post (minute)</label>
                                            <input type="number" class="form-control" autocomplete="off" name="interval_per_post" value="5">
                                        </div>
                                    </div>
                                </div>
                                <div class="row post-repost">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Repost frequency (day)</label>
                                            <select class="form-control" name="repost_frequency">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>
                                                <option value="36">36</option>
                                                <option value="37">37</option>
                                                <option value="38">38</option>
                                                <option value="39">39</option>
                                                <option value="40">40</option>
                                                <option value="41">41</option>
                                                <option value="42">42</option>
                                                <option value="43">43</option>
                                                <option value="44">44</option>
                                                <option value="45">45</option>
                                                <option value="46">46</option>
                                                <option value="47">47</option>
                                                <option value="48">48</option>
                                                <option value="49">49</option>
                                                <option value="50">50</option>
                                                <option value="51">51</option>
                                                <option value="52">52</option>
                                                <option value="53">53</option>
                                                <option value="54">54</option>
                                                <option value="55">55</option>
                                                <option value="56">56</option>
                                                <option value="57">57</option>
                                                <option value="58">58</option>
                                                <option value="59">59</option>
                                                <option value="60">60</option>
                                            </select>
                                            <span class="small">Set 0 to disable repost</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Repost until</label>
                                            <input type="text" class="form-control datetime hasDatepicker" autocomplete="off" name="repost_until" value="" id="dp1661307237713">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="fm-action text-right">
                            <button type="submit" data-action="{{url('post/save')}}" class="btn btn-info btn-schedule d-none">Schedule
                            </button><button type="submit" data-action="{{url('post/save')}}" class="btn btn-info btn-post-now">Post now
                            </button></div>
                        <div id="" class="modal fade post-modal">
                            <div class="modal-dialog modal-dialog-centered modal-md">
                                <div class="modal-content">
                                    <div class="modal-header bg-solid-warning">
                                        <h5 class="modal-title text-warning"><i class="fas fa-exclamation-circle"></i> Confirm</h5>
                                    </div>
                                    <div class="modal-body data-post-confirm">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-secondary">No, Cancel
                                        </button><button type="submit" data-dismiss="modal" data-action="{{url('post/save/true')}}" class="btn btn-info btn-post-try">Yes, I'm sure</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="column-three nicescroll">
                <div class="post">
                    <div class="row lg">
                        <div class="col p-0">
                            <div class="post-preview">
                                <div class="tab nav nav-tabs">
                                    <a href="#preview-tab-0" class="active" data-toggle="tab" aria-expanded="true"><i class="fab fa-instagram" style="color: #d62976"></i></a>
                                </div>
                                <div class="row justify-content-md-center m-t-30">
                                    <div class="col-md-8 col-sm-12 tab-content">
                                        <div class="tab-pane fade active show" id="preview-tab-0">
                                            <div class="preview-instagram">
                                                <div class="card border-0">
                                                    <div class="card-block p-0 border-0">
                                                        <div class="preview-instagram preview-instagram-photo item-post-type" data-type="media" style="">
                                                            <div class="preview-content">
                                                                <div class="user-info">
                                                                    <img class="img-circle" src="{{asset('themes/backend/default/assets/img/avatar.jpg')}}">
                                                                    <span>Anonymous</span>
                                                                </div>
                                                                <div class="preview-media" data-max-image="1"></div>
                                                                <div class="post-info">
                                                                    <div class="info-active pull-left"> Be the first to Like this</div>
                                                                    <div class="pull-right">1s</div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class="caption pt0">
                                                                    <div class="line-no-text"></div>
                                                                    <div class="line-no-text"></div>
                                                                    <div class="line-no-text w50"></div>
                                                                </div>
                                                                <div class="preview-comment">
                                                                    Add a comment
                                                                    <div class="icon-3dot"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="preview-instagram preview-instagram-photo item-post-type" data-type="photo" style="display: none;">
                                                            <div class="preview-content">
                                                                <div class="user-info">
                                                                    <img class="img-circle" src="{{asset('themes/backend/default/assets/img/avatar.jpg')}}">
                                                                    <span>Anonymous</span>
                                                                </div>
                                                                <div class="preview-media" data-max-image="1"></div>
                                                                <div class="post-info">
                                                                    <div class="info-active pull-left"> Be the first to Like this</div>
                                                                    <div class="pull-right">1s</div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class="caption pt0">
                                                                    <div class="line-no-text"></div>
                                                                    <div class="line-no-text"></div>
                                                                    <div class="line-no-text w50"></div>
                                                                </div>
                                                                <div class="preview-comment">
                                                                    Add a comment
                                                                    <div class="icon-3dot"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="preview-instagram preview-instagram-photo item-post-type" data-type="video" style="display: none;">
                                                            <div class="preview-content">
                                                                <div class="user-info">
                                                                    <img class="img-circle" src="{{asset('themes/backend/default/assets/img/avatar.jpg')}}">
                                                                    <span>Anonymous</span>
                                                                </div>
                                                                <div class="preview-media" data-max-image="1"></div>
                                                                <div class="post-info">
                                                                    <div class="info-active pull-left"> Be the first to Like this</div>
                                                                    <div class="pull-right">1s</div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class="caption pt0">
                                                                    <div class="line-no-text"></div>
                                                                    <div class="line-no-text"></div>
                                                                    <div class="line-no-text w50"></div>
                                                                </div>
                                                                <div class="preview-comment">
                                                                    Add a comment
                                                                    <div class="icon-3dot"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="preview-instagram preview-instagram-photo item-post-type" data-type="link" style="display: none;">
                                                            <div class="preview-content">
                                                                <div class="user-info">
                                                                    <img class="img-circle" src="{{asset('themes/backend/default/assets/img/avatar.jpg')}}">
                                                                    <span>Anonymous</span>
                                                                </div>
                                                                <div class="preview-media" data-max-image="1"></div>
                                                                <div class="post-info">
                                                                    <div class="info-active pull-left"> Be the first to Like this</div>
                                                                    <div class="pull-right">1s</div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class="caption pt0">
                                                                    <div class="line-no-text"></div>
                                                                    <div class="line-no-text"></div>
                                                                    <div class="line-no-text w50"></div>
                                                                </div>
                                                                <div class="preview-comment">
                                                                    Add a comment
                                                                    <div class="icon-3dot"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="preview-instagram preview-instagram-story item-post-type" data-type="story" style="display: none;">
                                                            <div class="preview-media" data-max-image="1"></div>
                                                        </div>
                                                        <div class="preview-instagram preview-instagram-photo item-post-type" data-type="igtv" style="display: none;">
                                                            <div class="preview-content">
                                                                <div class="user-info">
                                                                    <img class="img-circle" src="{{asset('themes/backend/default/assets/img/avatar.jpg')}}">
                                                                    <span>Anonymous</span>
                                                                </div>
                                                                <div class="preview-media" data-max-image="1"></div>
                                                                <div class="post-info">
                                                                    <div class="info-active pull-left"> Be the first to Like this</div>
                                                                    <div class="pull-right">1s</div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class="caption pt0">
                                                                    <div class="line-no-text"></div>
                                                                    <div class="line-no-text"></div>
                                                                    <div class="line-no-text w50"></div>
                                                                </div>
                                                                <div class="preview-comment">
                                                                    Add a comment
                                                                    <div class="icon-3dot"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="preview-instagram preview-instagram-carousel item-post-type" data-type="carousel" style="display: none;">
                                                            <div class="preview-content">
                                                                <div class="user-info">
                                                                    <img class="img-circle" src="{{asset('themes/backend/default/assets/img/avatar.jpg')}}">
                                                                    <span>Anonymous</span>
                                                                </div>
                                                                <div class="preview-media preview-carousel owl-carousel owl-theme" data-max-image="9"></div>
                                                                <div class="post-info">
                                                                    <div class="info-active pull-left"> Be the first to Like this</div>
                                                                    <div class="pull-right">1s</div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class="caption pt0">
                                                                    <div class="line-no-text"></div>
                                                                    <div class="line-no-text"></div>
                                                                    <div class="line-no-text w50"></div>
                                                                </div>
                                                                <div class="preview-comment">
                                                                    Add a comment
                                                                    <div class="icon-3dot"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="preview-instagram preview-instagram-photo item-post-type" data-type="text" style="display: none;">
                                                            <div class="text-center p-25">
                                                                This social network not support post this post type                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
