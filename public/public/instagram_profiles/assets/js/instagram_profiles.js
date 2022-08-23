"use strict";
function Instagram_profiles(){
    var self= this;
    this.init= function(){
    };

    this.open_security_form = function(){
        $(".security-code").removeClass("d-none");
    };

    this.open_verification_form = function(){
        $(".verification-code").removeClass("d-none");
    };
}

var Instagram_profiles = new Instagram_profiles();
$(function(){
    Instagram_profiles.init();
});