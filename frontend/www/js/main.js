require.config({
    baseUrl: '/js',
    paths: {
        jquery: 'libs/jquery-1.9.0',
        imagesLoaded: 'libs/imagesloaded.pkgd'
    }
});

require(['jquery', 'libs/highlight.pack', 'disqus', 'back2top', 'jstest'],
function($, hljs, disqus, back2top){
    hljs.configure({
        tabReplace: '    '
    });
    hljs.initHighlightingOnLoad();
    back2top();
    disqus();
});