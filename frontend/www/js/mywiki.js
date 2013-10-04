$().ready(function(){
	var UI = {};
	
	//load high light js
	function loadHightJs(){
		UI.loaded = {};
		var flag = false;
		$('pre').each(function(){
			if($(this).attr('class') && /brush:/.test($(this).attr('class'))){
				if(flag === false){
					registerJavascriptFile('/js/highlight/shCore.js');
					registerJavascriptFile('/js/highlight/shAutoloader.js');
					flag = true;
				}
				var type = $(this).attr('class').split(':')[1];
				if(UI.loaded['"'+type+'"'] == undefined){
					UI.loaded['"'+type+'"'] = (function(type){
						if(/\b(jscript)|(javascript)|(js)\b/.test(type))
							return 'js jscript javascript  @shBrushJScript.js';
						if(/\bphp\b/.test(type))
							return 'php @shBrushPhp.js';
						if(/\bpython\b/.test(type))
							return 'python @shBrushPython.js';
						if(/\bbash\b/.test(type))
								return 'bash @shBrushBash.js';
						if(/\bconf\b/.test(type))
								return 'conf @shBrushConf.js';
						if(/\bsql\b/.test(type))
								return 'sql @shBrushSql.js';
					})(type);
				}
			}
		});
		return flag;
	}
	
	function registerJavascriptFile(src){
		var tag = '<script type="text/javascript" src="'+src+'"></script>';
		$('head').append(tag);
	}
	
	function registerCssFile(href){
		var tag = '<link rel="stylesheet" type="text/css" href="'+href+'" />';
		$('head').append(tag);
	}
	
	function path()
	{
	    var args = arguments[0], result = [];
	    for(var i in args)
	    	result.push(args[i].replace('@', '/js/highlight/scripts/'));
	    return result
	};

	if(loadHightJs()){
		registerCssFile('/css/highlight/shCore.css');
		registerCssFile('/css/highlight/shThemeRDark.css');
		SyntaxHighlighter.defaults['toolbar'] = false;
		SyntaxHighlighter.autoloader.apply(null, path(UI.loaded));
		SyntaxHighlighter.all();
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