"use strict";
function Schedules(){
    var self= this;
    this.init= function(){
        self.action();
    };

    this.action = function(){
        if( $(".schedules").length > 0 ){
            var type = $(".schedules .widget-item.active").data("type");
            var category = $(".schedules .widget-item.active").data("category");
            var time = $(".schedules .widget-item.active").data("time");
            var d =new Date(time);
            $('#schedule-calendar').monthly({
                mode: 'event',
                dataType: 'json',
                jsonUrl: PATH+'schedules/get/'+type+'/'+category,
                eventList: false,
                setDate: d.getTime()/1000
            });
            
            $(".monthly-day[data-time='"+time+"']").addClass("active");

            $(document).on("click", ".monthly-day", function(){
                var that = $(".schedules .calendar");
                var time = $(this).data('time');
                var type = $(".schedules .widget-item.active").data("type");
                var category = $(".schedules .widget-item.active").data("category");
                var params = { token: token };
                var action = PATH + "schedules/index/" + type + "/" + category + "/" + time;

                $(".monthly-day").removeClass("active");
                $(this).addClass("active");
                Core.ajax_post( that, action, params, function(result){
                    Core.overplay("hide");
                    Layout.search('search-schedule');
                    Layout.nicescroll();
                    $('body').addClass(' subheader-right-open');
                    history.pushState(null, '', action);
                    $(".schedules-type .widget-item").attr("data-time", time);
                });
            });

            $(document).on("click", ".schedules-type .widget-item a", function(){
                var time = $(this).parents(".widget-item").attr("data-time");
                var url = $(this).attr("href") + time;
                location.assign( url );
                return false;
            });

            $(document).on("change", "input[name='module']", function(){
                var type = $(".schedules .widget-item.active").data("type");
                var time = $(".schedules .widget-item.active").data("time");
                var category = $(this).val();
                var url = PATH + "schedules/index/" + type + "/" + category + "/" + time;
                location.assign( url );
                Core.overplay();
            });

            $(document).on("click", ".schedules-of a", function(){
                var type = $(".schedules .widget-item.active").data("type");
                var time = $(".schedules .widget-item.active").data("time");
                var category = $(this).next().find("input").val();
                var url = PATH + "schedules/index/" + type + "/" + category + "/" + time;
                location.assign( url );
                Core.overplay();
            });
        }
    }
}

var Schedules = new Schedules();
$(function(){
    Schedules.init();
});