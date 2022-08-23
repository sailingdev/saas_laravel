"use strict";
function Proxy_manager(){
    var self= this;
    this.init= function(){

        $(document).on("change", ".proxy-manager input[name='proxy']", function(){
            var proxy = $(this).val();
            if(proxy != ""){
                Core.ajax_post($(this), PATH+"proxy_manager/proxy_info", { token: token, proxy: proxy}, function(result){
                    if(result.status == "success"){
                        $(".proxy-manager select[name='location']").val(result.code);
                    }else{
                        $(".proxy-manager select[name='location']").val("unknown");
                    }               
                });
            }
        });
    };
}

var Proxy_manager = new Proxy_manager();
$(function(){
    Proxy_manager.init();
});