/*

MAIN APP HERE

*/

function App(args) {

    $.window = $(window);
    $.body = $("body");
    $.ww = $.window.width();
    $.wh = $.window.height();
    $.mobile = Utils.checkMobile();
	$.tablet = Utils.checkTablet();
	if($.mobile || $.tablet){
		 $.body.removeClass("desktop");
	}
    
    $.useCssAnim = Modernizr.csstransforms3d;
    
    this.init(args);

}

App.prototype = {

    init:function(args){
        $.window.resize(jQuery.proxy(this, "resizeElements"));
    },

    resizeElements: function(event){
        $.ww = $.window.width();
        $.wh = $.window.height();
    }

}
