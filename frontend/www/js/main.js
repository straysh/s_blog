require.config({
    baseUrl: '/js',
    paths: {
        jquery: 'libs/jquery-1.9.0',
        imagesLoaded: 'libs/imagesloaded.pkgd'
    }
});

require(['jquery', 'libs/highlight.pack', 'back2top', 'jstest', 'disqus'],
function($, hljs, disqus, back2top, jstestModule){
    hljs.configure({
        tabReplace: '    '
    });
    hljs.initHighlightingOnLoad();
    back2top();
    disqus();
    jstestModule();
});