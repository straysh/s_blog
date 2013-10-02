$().ready(function(){
	var UI = {};
	
	//load high light js
	function loadHightJs(){
		UI.loaded = {};
		$('pre').each(function(){
			if($(this).attr('class') && /brush:/.test($(this).attr('class'))){
				if(UI.loaded.core===undefined){
					registerJavascriptFile('/js/highlight/shCore.js');
					UI.loaded.core='core';
				}
				var type = $(this).attr('class').split(':')[1];
				if(UI.loaded['"'+type+'"'] == undefined){
					UI.loaded['"'+type+'"'] = 1;
					registerJavascriptFile('/js/highlight/shBrush'+type.replace(/^[a-zA-Z]/, type[0].toUpperCase())+'.js');
				}else{
					UI.loaded['"'+type+'"'] += 1;
				}
			}
		});
		return true;
	}
	
	function registerJavascriptFile(src){
		var tag = '<script type="text/javascript" src="'+src+'"></script>';
		$('head').append(tag);
	}
	
	function registerCssFile(href){
		var tag = '<link rel="stylesheet" type="text/css" href="'+href+'" />';
		$('head').append(tag);
	}

	if(loadHightJs()){
		registerCssFile('/css/highlight/shCore.css');
		registerCssFile('/css/highlight/shThemeRDark.css');
		SyntaxHighlighter.defaults['toolbar'] = false;	SyntaxHighlighter.all();
//		jQuery("#admin_treeview").treeview({'animated':'fast','control':'#treecontrol','persist':'cookie'});
	}
	UI.disqusLoaded = false;
	if($('#disqus_thread').length > 0){
		$(window).mousewheel(function(event, delta, deltaX, deltaY){
			var scrollH	=	$(window).scrollTop();
			var viewH	=	$(window).height();
			var limit	=	$('#site-footer').position().top-20;
			if( (viewH+scrollH) >= limit && !UI.disqusLoaded){
				if(delta < 0){
					UI.disqusLoaded=true;
					$.getScript('/js/disqus.js');
				}
			}
		});
	}
});