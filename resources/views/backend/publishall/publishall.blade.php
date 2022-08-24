@extends('layouts.backend.app_backend')
@section('content')
    <div class="subheader {{Helper::class_main(1)}}">
        <div class="wrap">
            <div class="subheader-main wrap-m w-100 p-r-0">
                <div class="wrap-c">
                    <button type="button" class="btn btn-label-info m-r-10 subheader-toggle"><i class="fas fa-bars"></i>
                    </button>
                    <h3 class="title"><i class="far fa-paper-plane text-info" style="color: #1ac958"></i> Publish all</h3>
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
                            <i class="fas fa-plus-square"></i> Add account</a>
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
                                    <input type="radio" name="post_type" checked="" value="photo"> <i class="far fa-images"></i> Photo					<span class="d-none"></span>
                                </label>
                            </a>
                        </div>
                        <div class="item col p-l-0 p-r-0 ">
                            <a href="javascript:void(0);">
                                <label class="i-radio i-radio--tick i-radio--brand m-b-0 p-l-0">
                                    <input type="radio" name="post_type" value="video"> <i class="fas fa-video"></i> Video					<span class="d-none"></span>
                                </label>
                            </a>
                        </div>
                        <div class="item col p-l-0 p-r-0 ">
                            <a href="javascript:void(0);">
                                <label class="i-radio i-radio--tick i-radio--brand m-b-0 p-l-0">
                                    <input type="radio" name="post_type" value="link"> <i class="fas fa-link"></i> Link					<span class="d-none"></span>
                                </label>
                            </a>
                        </div>
                        <div class="item col p-l-0 p-r-0 ">
                            <a href="javascript:void(0);">
                                <label class="i-radio i-radio--tick i-radio--brand m-b-0 p-l-0">
                                    <input type="radio" name="post_type" value="text"> <i class="far fa-file-alt"></i> Text					<span class="d-none"></span>
                                </label>
                            </a>
                        </div>
                    </div>
                    <div class="post-content m-b-15">
                        <div class="item-post-type" data-type="photo" style="">
                            <div class="file-manager">
                                <div class="fm-wiget">
                                    <div class="fm-progress-bar"></div>
                                    <div class="fm-files sortable ui-sortable"></div>
                                    <div class="fm-toolbar">
                                        <div class="btn-group btn-group-sm" role="group">
                                            <button type="button" class="btn btn-secondary btnOpenFileManager" data-select="multi" data-file-type="image"><i class="far fa-folder-open"></i> File manager</button>
                                            <button type="button" class="btn btn-secondary fileinput-button" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="Upload"><i class="fas fa-upload"></i><input id="upload_photo" type="file" name="files[]" multiple=""></button>
                                            <button type="button" class="btn btn-secondary btn-google-drive" id="btn-google-drive" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="Google Drive"><i class="fab fa-google-drive"></i></button>
                                            <button type="button" class="btn btn-secondary btn-dropbox" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="Dropbox"><i class="fab fa-dropbox"></i></button>
                                            <button type="button" class="btn btn-secondary btn-onedrive" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="OneDrive"><i class="fas fa-cloud"></i></button>
                                            <button type="button" class="btn btn-secondary btn-upload-from-url" data-text="Enter media url"><i class="fas fa-link"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="item-post-type" data-type="video" style="display: none;">
                            <div class="file-manager">
                                <div class="fm-wiget">
                                    <div class="fm-progress-bar"></div>
                                    <div class="fm-files sortable ui-sortable"></div>
                                    <div class="fm-toolbar">
                                        <div class="btn-group btn-group-sm" role="group">
                                            <button type="button" class="btn btn-secondary btnOpenFileManager" data-select="single" data-file-type="video"><i class="far fa-folder-open"></i> File manager</button>
                                            <button type="button" class="btn btn-secondary fileinput-button" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="Upload"><i class="fas fa-upload"></i><input id="upload_video" type="file" name="files[]" multiple=""></button>
                                            <button type="button" class="btn btn-secondary btn-google-drive" id="btn-google-drive" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="Google Drive"><i class="fab fa-google-drive"></i></button>
                                            <button type="button" class="btn btn-secondary btn-dropbox" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="Dropbox"><i class="fab fa-dropbox"></i></button>
                                            <button type="button" class="btn btn-secondary btn-onedrive" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="OneDrive"><i class="fas fa-cloud"></i></button>
                                            <button type="button" class="btn btn-secondary btn-upload-from-url" data-text="Enter media url"><i class="fas fa-link"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item-post-type" data-type="link" style="display: none;">
                            <label class="text-uppercase">Link url</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="link" placeholder="Enter your link">
                            </div>			<label class="text-uppercase">Thumbnail</label>
                            <div class="file-manager">
                                <div class="fm-wiget">
                                    <div class="fm-progress-bar"></div>
                                    <div class="fm-files sortable ui-sortable"></div>
                                    <div class="fm-toolbar">
                                        <div class="btn-group btn-group-sm" role="group">
                                            <button type="button" class="btn btn-secondary btnOpenFileManager" data-select="single" data-file-type="image"><i class="far fa-folder-open"></i> File manager</button>
                                            <button type="button" class="btn btn-secondary fileinput-button" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="Upload"><i class="fas fa-upload"></i><input id="upload_link" type="file" name="files[]" multiple=""></button>
                                            <button type="button" class="btn btn-secondary btn-google-drive" id="btn-google-drive" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="Google Drive"><i class="fab fa-google-drive"></i></button>
                                            <button type="button" class="btn btn-secondary btn-dropbox" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="Dropbox"><i class="fab fa-dropbox"></i></button>
                                            <button type="button" class="btn btn-secondary btn-onedrive" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="OneDrive"><i class="fas fa-cloud"></i></button>
                                            <button type="button" class="btn btn-secondary btn-upload-from-url" data-text="Enter media url"><i class="fas fa-link"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="caption m-t-15">
                            <textarea name="caption" class="form-control post-message" placeholder="Enter your caption"></textarea>
                            <div class="caption-toolbar">
                                <div class="item">
                                    <div class="count-word"><i class="fas fa-text-width"></i> <span>0</span></div>
                                </div>
                                <a href="javascript:void(0);" class="item get-caption" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="Get caption"><i class="far fa-list-alt"></i></a><a href="javascript:void(0);" class="item save-caption" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="" data-original-title="Save caption"><i class="far fa-save"></i></a></div>
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
                                        <input type="text" class="form-control datetime hasDatepicker" autocomplete="off" name="time_post" value="" id="dp1661309256870">
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
                                        <input type="text" class="form-control datetime hasDatepicker" autocomplete="off" name="repost_until" value="" id="dp1661309256871">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="fm-action text-right">
                        <button type="submit" data-action="{{url('post/save')}}" class="btn btn-info btn-schedule d-none">Schedule</button>
                        <button type="submit" data-action="{{url('post/save')}}" class="btn btn-info btn-post-now">Post now</button>
                    </div>
                    <div id="" class="modal fade post-modal">
                        <div class="modal-dialog modal-dialog-centered modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-solid-warning">
                                    <h5 class="modal-title text-warning"><i class="fas fa-exclamation-circle"></i> Confirm</h5>
                                </div>
                                <div class="modal-body data-post-confirm">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-secondary">No, Cancel</button>
                                    <button type="submit" data-dismiss="modal" data-action="{{url('post/save/true')}}" class="btn btn-info btn-post-try">Yes, I'm sure</button>
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
                                    <a href="#preview-tab-0" class="active" data-toggle="tab" aria-expanded="true"><i class="fab fa-facebook-square" style="color: #3b5998"></i></a>
                                    <a href="#preview-tab-1" class="" data-toggle="tab" aria-expanded="true"><i class="fab fa-instagram" style="color: #d62976"></i></a>
                                    <a href="#preview-tab-2" class="" data-toggle="tab" aria-expanded="true"><i class="fab fa-twitter" style="color: #00acee"></i></a>
                                </div>

                                <div class="row justify-content-md-center m-t-30">
                                    <div class="col-md-8 col-sm-12 tab-content">
                                        <div class="tab-pane fade active show" id="preview-tab-0">
                                            <div class="preview-facebook">
                                                <div class="card">
                                                    <div class="card-body p-0">
                                                        <div class="preview-facebook preview-facebook-media item-post-type" data-type="media" style="display: none;">
                                                            <div class="user-info">
                                                                <img class="img-circle" src="{{asset('themes/backend/default/assets/img/avatar.jpg')}}">
                                                                <div class="text">
                                                                    <div class="name"> Anonymous</div>
                                                                    <span> Just now . <i class="fa fa-globe" aria-hidden="true"></i></span>
                                                                </div>
                                                            </div>
                                                            <div class="caption">
                                                                <div class="line-no-text"></div>
                                                                <div class="line-no-text"></div>
                                                                <div class="line-no-text w50"></div>
                                                            </div>
                                                            <div class="preview-media" data-max-image="5"></div>
                                                            <div class="preview-comment">
                                                                <div class="row">
                                                                    <div class="col item">
                                                                        <i class="facebook-icon like" aria-hidden="true"></i> Like</div>
                                                                    <div class="col item">
                                                                        <i class="facebook-icon comment" aria-hidden="true"></i> Comment</div>
                                                                    <div class="col item">
                                                                        <i class="facebook-icon share" aria-hidden="true"></i> Share
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="preview-facebook preview-facebook-media item-post-type" data-type="photo" style="">
                                                            <div class="user-info">
                                                                <img class="img-circle" src="{{asset('themes/backend/default/assets/img/avatar.jpg')}}">
                                                                <div class="text">
                                                                    <div class="name"> Anonymous</div>
                                                                    <span> Just now . <i class="fa fa-globe" aria-hidden="true"></i></span>
                                                                </div>
                                                            </div>
                                                            <div class="caption">
                                                                <div class="line-no-text"></div>
                                                                <div class="line-no-text"></div>
                                                                <div class="line-no-text w50"></div>
                                                            </div>
                                                            <div class="preview-media" data-max-image="5"></div>
                                                            <div class="preview-comment">
                                                                <div class="row">
                                                                    <div class="col item">
                                                                        <i class="facebook-icon like" aria-hidden="true"></i> Like</div>
                                                                    <div class="col item">
                                                                        <i class="facebook-icon comment" aria-hidden="true"></i> Comment</div>
                                                                    <div class="col item">
                                                                        <i class="facebook-icon share" aria-hidden="true"></i> Share</div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="preview-facebook preview-facebook-media item-post-type" data-type="video" style="display: none;">
                                                            <div class="user-info">
                                                                <img class="img-circle" src="{{asset('themes/backend/default/assets/img/avatar.jpg')}}">
                                                                <div class="text">
                                                                    <div class="name"> Anonymous</div>
                                                                    <span> Just now . <i class="fa fa-globe" aria-hidden="true"></i></span>
                                                                </div>
                                                            </div>
                                                            <div class="caption">
                                                                <div class="line-no-text"></div>
                                                                <div class="line-no-text"></div>
                                                                <div class="line-no-text w50"></div>
                                                            </div>
                                                            <div class="preview-media" data-max-image="5"></div>
                                                            <div class="preview-comment">
                                                                <div class="row">
                                                                    <div class="col item">
                                                                        <i class="facebook-icon like" aria-hidden="true"></i> Like</div>
                                                                    <div class="col item">
                                                                        <i class="facebook-icon comment" aria-hidden="true"></i> Comment</div>
                                                                    <div class="col item">
                                                                        <i class="facebook-icon share" aria-hidden="true"></i> Share</div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="preview-facebook preview-facebook-link item-post-type" data-type="link" style="display: none;">
                                                            <div class="user-info">
                                                                <img class="img-circle" src="{{asset('themes/backend/default/assets/img/avatar.jpg')}}">
                                                                <div class="text">
                                                                    <div class="name"> Anonymous</div>
                                                                    <span> Just now . <i class="fa fa-globe" aria-hidden="true"></i></span>
                                                                </div>
                                                            </div>
                                                            <div class="caption"><div class="line-no-text"></div><div class="line-no-text"></div><div class="line-no-text w50"></div></div>

                                                            <div class="preview-link">
                                                                <div class="image"></div>
                                                                <div class="info">
                                                                    <div class="title"><div class="line-no-text"></div></div>
                                                                    <div class="desc"><div class="line-no-text"></div><div class="line-no-text"></div><div class="line-no-text"></div></div>
                                                                    <div class="website"><div class="line-no-text w50"></div></div>
                                                                </div>
                                                            </div>

                                                            <div class="preview-comment">
                                                                <div class="row">
                                                                    <div class="col item">
                                                                        <i class="facebook-icon like" aria-hidden="true"></i> Like</div>
                                                                    <div class="col item">
                                                                        <i class="facebook-icon comment" aria-hidden="true"></i> Comment</div>
                                                                    <div class="col item">
                                                                        <i class="facebook-icon share" aria-hidden="true"></i> Share</div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="preview-facebook preview-facebook-text item-post-type" data-type="text" style="display: none;">
                                                            <div class="user-info">
                                                                <img class="img-circle" src="{{asset('themes/backend/default/assets/img/avatar.jpg')}}">
                                                                <div class="text">
                                                                    <div class="name"> Anonymous</div>
                                                                    <span> Just now . <i class="fa fa-globe" aria-hidden="true"></i></span>
                                                                </div>
                                                            </div>
                                                            <div class="caption"><div class="line-no-text"></div><div class="line-no-text"></div><div class="line-no-text w50"></div></div>

                                                            <div class="preview-comment">
                                                                <div class="row">
                                                                    <div class="col item">
                                                                        <i class="facebook-icon like" aria-hidden="true"></i> Like</div>
                                                                    <div class="col item">
                                                                        <i class="facebook-icon comment" aria-hidden="true"></i> Comment</div>
                                                                    <div class="col item">
                                                                        <i class="facebook-icon share" aria-hidden="true"></i> Share</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade " id="preview-tab-1">
                                            <div class="preview-instagram">
                                                <div class="card border-0">
                                                    <div class="card-block p-0 border-0">
                                                        <div class="preview-instagram preview-instagram-photo item-post-type" data-type="media" style="display: none;">
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
                                                        <div class="preview-instagram preview-instagram-photo item-post-type" data-type="photo" style="">
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
                                                                This social network not support post this post type</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade " id="preview-tab-2">
                                            <div class="preview-twitter">
                                                <div class="card">
                                                    <div class="card-body p-0">
                                                        <div class="preview-twitter preview-twitter-photo item-post-type" data-type="media" style="display: none;">
                                                            <div class="preview-content">
                                                                <div class="user-info">
                                                                    <img class="img-circle" src="{{asset('themes/backend/default/assets/img/avatar.jpg')}}">
                                                                    <div class="text">
                                                                        <div class="name">Anonymous</div>
                                                                        <span>@username</span>
                                                                    </div>
                                                                </div>
                                                                <div class="caption"><div class="line-no-text"></div><div class="line-no-text"></div><div class="line-no-text w50"></div></div>
                                                                <div class="preview-media" data-max-image="4"></div>

                                                                <div class="post-info">
                                                                    <div class="info-active">2:47 AM 24 Aug, 2022</div>
                                                                    <div class="clearfix"></div>
                                                                </div>

                                                                <div class="preview-comment">
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <i class="far fa-comment" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <i class="fas fa-retweet" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <i class="far fa-heart" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <i class="fas fa-upload" aria-hidden="true"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="preview-twitter preview-twitter-photo item-post-type" data-type="photo" style="">
                                                            <div class="preview-content">
                                                                <div class="user-info">
                                                                    <img class="img-circle" src="{{asset('themes/backend/default/assets/img/avatar.jpg')}}">
                                                                    <div class="text">
                                                                        <div class="name">Anonymous</div>
                                                                        <span>@username</span>
                                                                    </div>
                                                                </div>
                                                                <div class="caption"><div class="line-no-text"></div><div class="line-no-text"></div><div class="line-no-text w50"></div></div>
                                                                <div class="preview-media" data-max-image="4"></div>

                                                                <div class="post-info">
                                                                    <div class="info-active">2:47 AM 24 Aug, 2022</div>
                                                                    <div class="clearfix"></div>
                                                                </div>

                                                                <div class="preview-comment">
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <i class="far fa-comment" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <i class="fas fa-retweet" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <i class="far fa-heart" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <i class="fas fa-upload" aria-hidden="true"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="preview-twitter preview-twitter-photo item-post-type" data-type="video" style="display: none;">
                                                            <div class="preview-content">
                                                                <div class="user-info">
                                                                    <img class="img-circle" src="{{asset('themes/backend/default/assets/img/avatar.jpg')}}">
                                                                    <div class="text">
                                                                        <div class="name">Anonymous</div>
                                                                        <span>@username</span>
                                                                    </div>
                                                                </div>
                                                                <div class="caption"><div class="line-no-text"></div><div class="line-no-text"></div><div class="line-no-text w50"></div></div>
                                                                <div class="preview-media" data-max-image="4"></div>

                                                                <div class="post-info">
                                                                    <div class="info-active">2:47 AM 24 Aug, 2022</div>
                                                                    <div class="clearfix"></div>
                                                                </div>

                                                                <div class="preview-comment">
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <i class="far fa-comment" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <i class="fas fa-retweet" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <i class="far fa-heart" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <i class="fas fa-upload" aria-hidden="true"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="preview-twitter preview-twitter-link item-post-type" data-type="link" style="display: none;">
                                                            <div class="preview-content">
                                                                <div class="user-info">
                                                                    <img class="img-circle" src="{{asset('themes/backend/default/assets/img/avatar.jpg')}}">
                                                                    <div class="text">
                                                                        <div class="name">Anonymous</div>
                                                                        <span>@username</span>
                                                                    </div>
                                                                </div>
                                                                <div class="caption"><div class="line-no-text"></div><div class="line-no-text"></div><div class="line-no-text w50"></div></div>

                                                                <div class="preview-link">
                                                                    <div class="image"></div>
                                                                    <div class="info">
                                                                        <div class="title"><div class="line-no-text"></div></div>
                                                                        <div class="desc">
                                                                            <div class="line-no-text"></div>
                                                                            <div class="line-no-text"></div>
                                                                            <div class="line-no-text"></div>
                                                                        </div>
                                                                        <div class="website">
                                                                            <div class="line-no-text w50"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="post-info">
                                                                    <div class="info-active">2:47 AM 24 Aug, 2022</div>
                                                                    <div class="clearfix"></div>
                                                                </div>

                                                                <div class="preview-comment">
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <i class="far fa-comment" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <i class="fas fa-retweet" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <i class="far fa-heart" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <i class="fas fa-upload" aria-hidden="true"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="preview-twitter preview-twitter-text item-post-type" data-type="text" style="display: none;">
                                                            <div class="preview-content">
                                                                <div class="user-info">
                                                                    <img class="img-circle" src="{{asset('themes/backend/default/assets/img/avatar.jpg')}}">
                                                                    <div class="text">
                                                                        <div class="name">Anonymous</div>
                                                                        <span>@username</span>
                                                                    </div>
                                                                </div>
                                                                <div class="caption"><div class="line-no-text"></div><div class="line-no-text"></div><div class="line-no-text w50"></div></div>

                                                                <div class="post-info">
                                                                    <div class="info-active">2:47 AM 24 Aug, 2022</div>
                                                                    <div class="clearfix"></div>
                                                                </div>

                                                                <div class="preview-comment">
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <i class="far fa-comment" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <i class="fas fa-retweet" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <i class="far fa-heart" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <i class="fas fa-upload" aria-hidden="true"></i>
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
                </div>
            </div>
        </div>
    </div>
@endsection
