@extends('layouts.backend.app_backend')
@section('content')
    <div class="subheader {{Helper::class_main(1)}}">
        <div class="wrap">
            <div class="fm-progress-bar"></div>
            <div class="subheader-main">
                <h3 class="title">
                    <i class="text-info far fa-folder-open"></i>
                    File manager
                </h3>
                <span class="separator"></span>
                <div class="small"> 0 Media Items</div>
            </div>
            <div class="subheader-toolbar">
                <div class="btn-group mr-2" role="group">
                    <button type="button" class="btn btn-secondary fileinput-button">
                        <i class="fas fa-upload"></i>
                        Upload
                        <input id="fileupload" type="file" name="files[]" multiple="">
                    </button>
                    <button type="button" class="btn btn-secondary btn-google-drive"
                        id="btn-google-drive" data-toggle="tooltip" data-trigger="hover"
                        data-placement="top" title="" data-original-title="Google Drive">
                        <i class="fab fa-google-drive"></i>
                    </button>
                    <button type="button" class="btn btn-secondary btn-dropbox"
                        data-toggle="tooltip" data-trigger="hover" data-placement="top"
                        title="" data-original-title="Dropbox">
                        <i class="fab fa-dropbox"></i>
                    </button>
                    <button type="button" class="btn btn-secondary btn-onedrive"
                        data-toggle="tooltip" data-trigger="hover" data-placement="top"
                        title="" data-original-title="OneDrive">
                        <i class="fas fa-cloud"></i>
                    </button>
                    <button type="button" class="btn btn-secondary btn-upload-from-url"
                        data-text="Enter media url">
                        <i class="fas fa-link"></i>
                    </button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-secondary fm-select-all" data-text="">
                        <span class="check"><i class="fas fa-check"></i> Select All </span>
                        <span class="uncheck"><i class="fas fa-times"></i> Deselect All </span>
                    </button>
                    <button type="button" class="btn btn-secondary fm-delete-all">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </div>
                <!-- <div class="btn-group" role="group">
                    <button type="button" class="btn btn-secondary"><i class="fas fa-th-large"></i></button>
                    <button type="button" class="btn btn-secondary"><i class="fas fa-list"></i></button>
                </div> -->
            </div>
        </div>
    </div>

    <div class="content-two-column content-two-column-right {{Helper::class_main(1)}}">
        <div class="column-one nicescroll">
            <div class="fm-sb-title">
                <i class="fas fa-filter text-info"></i>
                Filter Media
            </div>
            <div class="fm-filter">
                <div class="form-group">
                    <label>Media Notes</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button class="btn btn-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control filter-keyword" placeholder="Enter keywork">
                    </div>
                </div>
                <div class="form-group">
                    <label>Media Type</label>
                    <select class="form-control filter-type">
                        <option value="all">All Media</option>
                        <option value="image">Image</option>
                        <option value="video">Video</option>
                    </select>
                </div>
            </div>
            <div class="fm-sb-title m-t-30">
                <i class="fas fa-info-circle text-info"></i>
                Media info
            </div>
            <div class="fm-storage">
                <div class="fm-storage-size">
                    <div class="used">0 MB</div>
                    <div class="total">100 MB</div>
                    <div class="clearfix"></div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-info" style="width:0%"></div>
                    <div class="progress-bar bg-warning" style="width:0%"></div>
                </div>
                <div class="fm-storage-list">
                    <div class="fm-storage-item">
                        <div class="icon btn btn-label-info">
                            <i class="far fa-image"></i>
                        </div>
                        <div class="info">
                            <div class="name">Images</div>
                            <div class="desc">0 files</div>
                        </div>
                        <div class="number">
                            0 MB
                        </div>
                    </div>
                    <div class="fm-storage-item">
                        <div class="icon btn btn-label-warning">
                            <i class="fas fa-video"></i>
                        </div>
                        <div class="info">
                            <div class="name">Videos</div>
                            <div class="desc">0 files</div>
                        </div>
                        <div class="number">
                            0 MB
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="column-two nicescroll">
            <form action="" class="fm-form" method="POST">
                <div class="fm-content row ajax-load-files" data-action="{{url('ajax_load')}}" data-page="0" data-type="scroll" data-scroll=".file-manager .column-two">
                    <div class="fm-loading">
                        <img src="{{asset('system/file_manager/assets/img/loading.gif')}}">
                    </div>
                </div>
            </form>

            <style type="text/css">
                .fancybox-toolbar{
                    opacity: 1;
                    visibility: visible;
                }
            </style>
        </div>


    </div>
@endsection
