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

    this.overlayOpen = false;
    this.overlay = $("#overlay");
    this.overlayClose = $("#overlay-close", this.overlay);
    this.overlayContentContainer = $("#overlay-content", this.overlay);
    
    this.init(args);

}

App.prototype = {

    init:function(args){
        $.History = window.History;
        $.window.resize(jQuery.proxy(this, "resizeElements"));

        this.setupElements();
        //$.window.on('statechange',jQuery.proxy(this, "goToPage"));
        $.History.Adapter.bind(window,'statechange',jQuery.proxy(this, "goToPage"));
        
        $(".internal").on("tap", jQuery.proxy(this, "linkClicked"));
        this.overlayClose.on("tap", jQuery.proxy(this, "backToHome"));
    },

    setupElements:function(){
        //this.addHomeHistory();
        this.goToPage();
        TweenMax.set(this.overlay, {autoAlpha:0, display:"none"});
    },

    linkClicked: function(event){
        var elem = $(event.currentTarget);
        var url = elem.data("target");
        var title = elem.data("title");
        //

        //this.loadContent(url, title);

        var stateObj = { url: url, title: title, overlay: true };
        var pageURL = "?" + title;
        $.History.pushState(stateObj, "", pageURL);        

        event.preventDefault();
        return false;
    },

    goToPage: function(event){
        var stateObj = $.History.getState();
        stateObj.data.overlay ? this.loadContent(stateObj.data.url, stateObj.data.title) : this.goHome();
        //event.preventDefault();
        //return false;
    },

    loadContent: function(newUrl, newTitle){
        this.overlayContentContainer.html("");
        TweenMax.set(this.overlayContentContainer, {alpha:0});
        this.openOverlay();
        this.overlayContentContainer.load(newUrl + " #main-content", jQuery.proxy(this, "contentLoaded"));
        //alert(newUrl)
    },

    contentLoaded: function(event){
        TweenMax.to(this.overlayContentContainer, 0.5, {alpha:1, ease: Power2.easeOut});
    },

    openOverlay: function(event){
        this.windowScroll = $.window.scrollTop();
        $.body.css('top', -this.windowScroll + 'px').addClass("inActive");
        TweenMax.to(this.overlay, 0.4, {autoAlpha:1, display:"block", onStart: jQuery.proxy(this, "overlayOpening")});
    },

    overlayOpening: function(event){
        this.overlay.scrollTop(0);
    },

    closeOverlay: function(event){
        TweenMax.to(this.overlay, 0.4, {autoAlpha:0, display:"none", onComplete: jQuery.proxy(this, "overlayClosed")});
    },

    overlayClosed: function(event){
        
        $.body.removeClass("inActive");
        $.window.scrollTop(this.windowScroll);
    },

    backToHome: function(){
        this.addHomeHistory();
        this.goHome();
    },

    addHomeHistory: function(){
        var stateObj = {overlay: false};
        History.pushState(stateObj, "", "?");
    },

    goHome: function(){
        this.closeOverlay();
    },

    resizeElements: function(event){
        $.ww = $.window.width();
        $.wh = $.window.height();
    }

}
