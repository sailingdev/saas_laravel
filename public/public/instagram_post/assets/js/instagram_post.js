"use strict";
function Instagram_post(){
    var self= this;
    this.init= function(){
    	if($(".instagram-post").length > 0){
    		var post_type = $(".post input[name='post_type']:checked").val();
			if(post_type == "story"){
		    	$(".instagram-post-caption-box").hide();
		    }else{
		    	$(".instagram-post-caption-box").show();
		    }

			$(document).on('click', '.instagram-post .post-type .item a', function(){
		        var parent = $(this).parent();
		        if(!parent.hasClass('active')){
		            var post_type = parent.find("input").val();
		            if(post_type == "story"){
		            	$(".instagram-post-caption-box").hide();
		            }else{
		            	$(".instagram-post-caption-box").show();
		            }
		        }
		    });

		    if($('.post-comment').length > 0){
	            $(".post-comment").emojioneArea({
	                hideSource: true,
	                useSprite: false,
	                pickerPosition    : "bottom",
	                filtersPosition   : "top",
	            });

	            setTimeout(function(){
	                $(".emojionearea-editor").niceScroll({cursorcolor:"#ddd"});
	            }, 1000);
	        }

	        //Review content
	        if($(".post-comment").length > 0){
	            $(".post-comment").data("emojioneArea").on("keyup", function(editor) {
	                console.log(111);
	                var data = editor.html();
	                editor.parents(".caption").find('.count-word span').html( data.length );
	                if(data != ""){
	                    $(".post-preview .caption").html(data);
	                }else{
	                    $(".post-preview .caption").html('<div class="line-no-text"></div><div class="line-no-text"></div><div class="line-no-text w50"></div>');
	                }
	            });

	            $(".post-comment").data("emojioneArea").on("change", function(editor) {
	                var data = editor.html();
	                editor.parents(".caption").find('.count-word span').html( data.length );
	                if(data != ""){
	                    $(".post-preview .caption").html(data);
	                }else{
	                    $(".post-preview .caption").html('<div class="line-no-text"></div><div class="line-no-text"></div><div class="line-no-text w50"></div>');
	                }
	            });

	            $(".post-comment").data("emojioneArea").on("emojibtn.click", function(editor) {
	                var data = $(".emojionearea-editor").html();
	                editor.parents(".caption").find('.count-word span').html( data.length );
	                if(data != ""){
	                    $(".post-preview .caption").html(data);
	                }else{
	                    $(".post-preview .caption").html('<div class="line-no-text"></div><div class="line-no-text"></div><div class="line-no-text w50"></div>');
	                }
	            });
	        }
    	}
    };
}

var Instagram_post = new Instagram_post();
$(function(){
    Instagram_post.init();
});