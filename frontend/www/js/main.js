require.config({
    baseUrl: '/js',
    paths: {
        'jquery': 'libs/jquery-1.9.0'
    }
});

require(['jquery', 'libs/highlight.pack', 'disqus', 'back2top'], function($, hljs, disqus, back2top){
    hljs.initHighlightingOnLoad();
    back2top();
    disqus();
});