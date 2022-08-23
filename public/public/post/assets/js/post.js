"use strict";
function Post(){
    var self= this;
    this.init= function(){
        self.action();
        self.advance();
        self.location();
        self.schedule();
        self.caption();
        self.link();
        self.media();
        self.upload();
    };

    this.action = function(){

        if( $(".post.post-create").length > 0 ){
            $('[class^="wrapper"]').wrapAll('<form action="javascript:void(0);" class="actionPostFrom"></form>'); 
        }

        var post_type = $(".post input[name='post_type']:checked").val();
        $(".item-post-type").hide();
        $(".post-create .item-post-type[data-type='" + post_type + "']").show();
        $(".post-preview .item-post-type[data-type='" + post_type + "']").show();

        $(document).on('click', '.post .post-type .item a', function(){

            var parent = $(this).parent();

            if(!parent.hasClass('active')){

                parent.addClass('active').siblings().removeClass('active');
                parent.find('input').prop('checked', true);

                var post_type = parent.find("input").val();
                $(".item-post-type").hide();

                $(".post-create .item-post-type[data-type='" + post_type + "']").show();
                $(".post-preview .item-post-type[data-type='" + post_type + "']").show();
                
                $('.fm-wiget .fm-files').html('');

            }
        });

        $(document).on('submit', ".actionPostFrom", function(event) {
            event.preventDefault();    
            var _that  = $(this);
            var _action = $(this).find(".btn-post-now").data("action");
            var _data = _that.serialize();
            var _data = _data + '&' + $.param({token:token});
            
            Core.ajax_post(_that, _action, _data, function(result){

                switch(result.status) {
                    case "warning":
                        $('.data-post-confirm').html(result.errors);
                        $('.post-modal').modal('show');
                        break;
                }
            });
        });

        $(document).on('click', ".btn-post-try", function(event) {
            var _that = $(this);
            var _form = $(".btn-post-now").closest("form");
            var _action = $(this).data("action");
            var _data = _form.serialize();
            var _data = _data + '&' + $.param({token:token});
            Core.ajax_post(_that, _action, _data, null);
            return false;
        });

        if($('.post').length > 0){
            setInterval( function(){
                var post_type = $(".post input[name='post_type']:checked").val();
                $(".item-post-type[data-type!='"+post_type+"'] .fm-wiget .fm-files").html('');
            }, 1000);
        }

    };

    this.advance = function(){
        $(document).on("click", ".post .post-advance .nav-link", function(){
            var that = $(this);
            var parent = that.parents(".post-advance");

            if(parent.hasClass("active")){
                parent.removeClass('active');
            }else{
                parent.addClass('active');
            }
        });
    };

    this.location = function(){
        var delay;
        $(".post .search-location").keyup(function(){

            var that = $(this);
            var action = that.data("action");
            var keyword = that.val();
            var data = $.param({token:token, keyword: keyword });
            clearTimeout(delay);

            if(keyword.length > 1)
            {
                $(".widget-location .loading").show();
                delay = setTimeout(function()
                { 
                    Core.ajax_post(that, action, data, function(result){
                        setTimeout(function(){
                            Layout.customscroll();
                            $(".widget-location .loading").hide();
                        }, 200);
                    });
                }, 2000);
            }
            else
            {
                $(".load-location").html();
                $(".widget-location .loading").hide();
            }

        });
    };

    this.schedule = function(){

        $(document).on("change", ".post-create input[name='is_schedule']", function(){

            if($(this).prop('checked')){

                $(".post .post-schedule").addClass("active");
                $(".post .btn-schedule").removeClass("d-none");
                $(".post .btn-post-now").addClass("d-none");

            }else{

                $(".post .post-schedule").removeClass("active");
                $(".post .btn-schedule").addClass("d-none");
                $(".post .btn-post-now").removeClass("d-none");

            }

        });

    };

    this.upload = function(){
        $(document).on("click", "#upload_photo", function(){
            File_Manager.uploadFile("#upload_photo");
        });

        $(document).on("click", "#upload_video", function(){
            File_Manager.uploadFile("#upload_video");
        });

        $(document).on("click", "#upload_link", function(){
            File_Manager.uploadFile("#upload_link");
        });

        $(document).on("click", "#upload_media", function(){
            File_Manager.uploadFile("#upload_media");
        });

        $(document).on("click", "#upload_story", function(){
            File_Manager.uploadFile("#upload_story");
        });

        $(document).on("click", "#upload_igtv", function(){
            File_Manager.uploadFile("#upload_igtv");
        });

        $(document).on("click", "#upload_carousel", function(){
            File_Manager.uploadFile("#upload_carousel");
        });
    };

    this.caption = function(){
        //Review content
        if($(".post-message").length > 0){
            $(".post-message").data("emojioneArea").on("keyup", function(editor) {
                console.log(111);
                var data = editor.html();
                editor.parents(".caption").find('.count-word span').html( data.length );
                if(data != ""){
                    $(".post-preview .caption").html(data);
                }else{
                    $(".post-preview .caption").html('<div class="line-no-text"></div><div class="line-no-text"></div><div class="line-no-text w50"></div>');
                }
            });

            $(".post-message").data("emojioneArea").on("change", function(editor) {
                var data = editor.html();
                editor.parents(".caption").find('.count-word span').html( data.length );
                if(data != ""){
                    $(".post-preview .caption").html(data);
                }else{
                    $(".post-preview .caption").html('<div class="line-no-text"></div><div class="line-no-text"></div><div class="line-no-text w50"></div>');
                }
            });

            $(".post-message").data("emojioneArea").on("emojibtn.click", function(editor) {
                var data = $(".emojionearea-editor").html();
                editor.parents(".caption").find('.count-word span').html( data.length );
                if(data != ""){
                    $(".post-preview .caption").html(data);
                }else{
                    $(".post-preview .caption").html('<div class="line-no-text"></div><div class="line-no-text"></div><div class="line-no-text w50"></div>');
                }
            });
        }
    };

    this.link = function(){

        $(document).on("change", ".post-create input[name='link']", function(){
            var that   = $(this);
            var url   = that.val();
            var action = PATH+"post/get_link";
            var data   = $.param({token:token, url: url});

            $(".preview-link .image").removeAttr("style");
            $(".preview-link .title").html('<div class="line-no-text"></div>');
            $(".preview-link .desc").html('<div class="line-no-text"></div><div class="line-no-text"></div><div class="line-no-text"></div>');
            $(".preview-link .website").html('<div class="line-no-text w50"></div>');

            if(url == ""){
                return false;
            }

            Core.ajax_post(that, action, data, function(result){
                if(result.status == "success"){
                    if(result.image != "")
                        $(".preview-link .image").css({'background-image': 'url(' + result.image + ')'});
                    if(result.title != "")
                        $(".preview-link .title").html(result.title);

                    if(result.description != "")
                        $(".preview-link .desc").html(result.description);
                    if(result.host != "")
                        $(".preview-link .website").html(result.host);
                }
            });
        });
    };

    this.media = function(){
        var medias = [];

        setInterval(function(){
            if($(".fm-item.ui-sortable-helper").length == 0){
                var preview = $('.post-preview .preview-media');
                var post_type = $(".post input[name='post_type']:checked").val();
                var media_item = $(".item-post-type[data-type='"+post_type+"'] .fm-item");

                if(media_item.length == 0)
                {
                    medias = [];
                    $('[class*="preview-media"]').removeClass(
                        function(i, c) {
                            if(c.match(/preview-media\d+/g) != null)
                                return c.match(/preview-media\d+/g).join(" ");
                        }
                    ).html('');
                    return false;
                }

                var new_medias = [];
                media_item.each( function(){
                    var media = $(this).find('input').val();                
                    if( new_medias.indexOf(media) == -1 ){
                        new_medias.push(media);
                    }
                } );

                if(new_medias.toString() != medias.toString() ){
                    $('.preview-media.owl-carousel').trigger('destroy.owl.carousel');

                    $('[class*="preview-media"]').removeClass(
                        function(i, c) {
                            if(c.match(/preview-media\d+/g) != null)
                                return c.match(/preview-media\d+/g).join(" ");
                        }
                    ).html('');


                    while(medias.length > 0) {
                        medias.pop();
                    }

                    media_item.each( function(){
                        var media = $(this).find('input').val();                
                        if( medias.indexOf(media) == -1 ){
                            medias.push(media);
                        }
                    });

                    $(".post-preview .preview-media").each(function(){
                        var max_image = $(this).data("max-image");
                        var media_count = medias.length > max_image?max_image:medias.length;
                        preview.addClass("preview-media"+media_count).html('');

                        for (var i = 0; i < medias.length; i++) {

                            if(medias[i] != undefined){
                                var file_type = medias[i].split('.').pop();

                                if(file_type != 'mp4'){
                                    preview.append("<div class='item' style=' background-image: url("+medias[i]+")' ></div>");
                                }else{
                                    preview.append('<div class="item"><video autoplay muted><source src="'+medias[i]+'" type="video/mp4"></video></div>');
                                }
                            }

                        };
                    });

                    $('.preview-media.owl-carousel').owlCarousel({items: 1});
                }

            }

        }, 1000);

    };

    this.load_video = function(){
        if($('.post-preview video').length > 0){
            $('.post-preview video').each(function( index ) {
                $(this).get(0).currentTime = 2;
            });
        }
    };
}

var Post = new Post();
$(function(){
    Post.init();
});