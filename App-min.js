function App(e){$.window=$(window),$.body=$("body"),$.ww=$.window.width(),$.wh=$.window.height(),$.mobile=Utils.checkMobile(),$.tablet=Utils.checkTablet(),($.mobile||$.tablet)&&$.body.removeClass("desktop"),$.useCssAnim=Modernizr.csstransforms3d,document.addEventListener("touchstart",function(){},!0),this.overlayOpen=!1,this.overlay=$("#overlay"),this.overlayClose=$("#overlay-close"),this.overlayBg=$("#overlay-bg",this.overlay),this.topOverlay=$("#top-overlay"),this.overlayContentContainer=$("#overlay-content",this.overlay),this.init(e)}App.prototype={init:function(e){$.History=window.History,$.window.resize(jQuery.proxy(this,"resizeElements")),this.setupElements(),$.History.Adapter.bind(window,"statechange",jQuery.proxy(this,"goToPage")),$(".internal").on("click",jQuery.proxy(this,"linkClicked")),this.overlayClose.on("tap",jQuery.proxy(this,"backToHome")),this.overlayBg.on("tap",jQuery.proxy(this,"backToHome")),this.topOverlay.on("tap",jQuery.proxy(this,"closeTopOverlay"))},setupElements:function(){this.goToPage(),TweenMax.set(this.overlay,{autoAlpha:0,display:"none"}),TweenMax.set(this.topOverlay,{autoAlpha:0,display:"none"}),TweenMax.set(this.overlayClose,{y:-85})},linkClicked:function(e){var o=$(e.currentTarget),t=o.data("target"),a=o.data("title"),n={url:t,title:a,overlay:!0},i="?"+a;return $.History.pushState(n,"",i),e.preventDefault(),!1},goToPage:function(e){var o=$.History.getState();o.data.overlay?this.loadContent(o.data.url,o.data.title):this.goHome()},loadContent:function(e,o){this.overlayContentContainer.html(""),TweenMax.set(this.overlayContentContainer,{alpha:0}),this.openOverlay(),this.overlayContentContainer.load(e+" #main-content",jQuery.proxy(this,"contentLoaded"))},contentLoaded:function(e){this.overlay.removeClass("loading"),TweenMax.to(this.overlayContentContainer,.7,{alpha:1,ease:Power2.easeOut}),$("#project-images li").on("tap",jQuery.proxy(this,"openImageLarge"))},openImageLarge:function(e){var o=$(e.currentTarget),t=o.css("background-image");t=t.replace("url(","").replace(")",""),this.topOverlay.css("background-image","url("+t+")"),TweenMax.to(this.topOverlay,.4,{autoAlpha:1,display:"block"})},closeTopOverlay:function(e){TweenMax.to(this.topOverlay,.4,{autoAlpha:0,display:"none"})},openOverlay:function(e){TweenMax.to(this.overlay,.4,{autoAlpha:1,display:"block",onStart:jQuery.proxy(this,"overlayOpening"),onComplete:jQuery.proxy(this,"overlayOpened")}),TweenMax.to(this.overlayClose,.5,{y:0,delay:.5,ease:Power3.easeOut})},overlayOpening:function(e){this.overlay.scrollTop(0)},closeOverlay:function(e){$.body.removeClass("inActive"),$.window.scrollTop(this.windowScroll),TweenMax.to(this.overlay,.4,{autoAlpha:0,display:"none",onComplete:jQuery.proxy(this,"overlayClosed")}),TweenMax.to(this.overlayClose,.55,{y:-85,ease:Power3.easeInOut})},overlayOpened:function(e){this.overlay.addClass("loading"),this.windowScroll=$.window.scrollTop(),$.body.css("top",-this.windowScroll+"px").addClass("inActive")},overlayClosed:function(e){},backToHome:function(){this.addHomeHistory(),this.goHome()},addHomeHistory:function(){var e={overlay:!1};History.pushState(e,"","?")},goHome:function(){this.closeOverlay()},resizeElements:function(e){$.ww=$.window.width(),$.wh=$.window.height()}};