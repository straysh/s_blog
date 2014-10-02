define(['jquery'], function($){
    var UI = {};

    function lowEnough() {
        var scrollH	=	$(window).scrollTop();
        var viewH	=	$(window).height();
        var limit	=	$('#site-footer').position().top-20;
        return (viewH+scrollH) >= limit && !UI.disqusLoaded;
    }

    function checkScroll() {
        if (!lowEnough()) {
            return __pollScroll();
        }
        UI.disqusLoaded=true;
        $.getScript('/js/libs/disqus.js');
    }

    function __pollScroll() {
        if(!$('#disqus_thread').length){
            return UI.disqusLoaded = true;
        }
        setTimeout(checkScroll, 100);
    }

    return __pollScroll;
});