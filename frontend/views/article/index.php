<?php 
Yii::app()->getClientScript()->registerCssFile('/css/highlight/shCore.css');
Yii::app()->getClientScript()->registerCssFile('/css/highlight/shThemeRDark.css');
Yii::app()->getClientScript()->registerScriptFile('/js/highlight/shCore.js', CClientScript::POS_HEAD);
Yii::app()->getClientScript()->registerScriptFile('/js/highlight/shBrushConf.js', CClientScript::POS_HEAD);
Yii::app()->getClientScript()->registerScriptFile('/js/highlight/shBrushBash.js', CClientScript::POS_HEAD);
Yii::app()->getClientScript()->registerScriptFile('/js/highlight/shBrushPhp.js', CClientScript::POS_HEAD);
Yii::app()->getClientScript()->registerScript('syntax_01', "SyntaxHighlighter.defaults['toolbar'] = false;	SyntaxHighlighter.all();", CClientScript::POS_READY);
?>
<h1 class="justcenter">Yii demo blog 分析</h1>
<p>首先搭建demo blog环境，更改数据库连接如下
</p>
<pre class='brush:conf'>
'db'=&gt;array(
	'connectionString' =&gt; 'mysql:host=localhost;dbname=blog',
	'emulatePrepare' =&gt; true,
	'username' =&gt; 'root',
	'password' =&gt; '123456',
	'charset' =&gt; 'utf8',
	'tablePrefix' =&gt; 'tbl_',
),
</pre>
<p>从<a href="http://www.blog.test/index.php?r=post/index">http://www.blog.test/index.php?r=post/index</a>访问demo blog。下面我们来一步步分解yii的执行流程：
</p>
<pre class='brush:php'>
$yii=dirname(__FILE__).'/../yii/framework/yii.php';		//加载yii框架
$config=dirname(__FILE__).'/protected/config/main.php';	//指定配置文件路径
// defined('YII_DEBUG') or define('YII_DEBUG',true);	//debug模式，默认关闭

require_once($yii);										//包含yii核心文件
Yii::createWebApplication($config)-&gt;run();				//这里是关键，每一次访问都从这里开始
</pre>
<p>最后一行代码分解为2部分来看:Yii::createWebApplication()和run()。Yii这个类定义在框架目录的根上yii.php。很明显这个类只是对YiiBase.php的一个包装，我们可以在yii.php按自己的需求定制。追这YiiBase.php，首先请大家快速的预览一下该文件。发现从L14-L43有着大量的常量定义。
</p>
<pre class='brush:php'>
//这里定义了app的开始时间。注意microtime(true)返回浮点数，省去了自己拼接的麻烦
defined('YII_BEGIN_TIME') or define('YII_BEGIN_TIME',microtime(true));
//是否开启debug模式，默认关闭
defined('YII_DEBUG') or define('YII_DEBUG',false);
//定义了Yii::trace()需要记录的堆栈调用(call stack information)信息(文件名和行号)。
//默认0，即不记录任何回溯信息(backtrace information)，大于0时，至多记录到该定义
//级别的call stacks信息(详细参看YiiBase::L460 log函数)
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',0);
//是否开启异常处理，默认开启
defined('YII_ENABLE_EXCEPTION_HANDLER') or define('YII_ENABLE_EXCEPTION_HANDLER',true);
//是否开启错误处理，默认开启
defined('YII_ENABLE_ERROR_HANDLER') or define('YII_ENABLE_ERROR_HANDLER',true);
//定义框架根路径
defined('YII_PATH') or define('YII_PATH',dirname(__FILE__));
//定义zii根路径
defined('YII_ZII_PATH') or define('YII_ZII_PATH',YII_PATH.DIRECTORY_SEPARATOR.'zii');

</pre>