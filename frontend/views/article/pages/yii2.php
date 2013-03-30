<?php 
Yii::app()->getClientScript()->registerCssFile('/css/highlight/shCore.css');
Yii::app()->getClientScript()->registerCssFile('/css/highlight/shThemeRDark.css');
Yii::app()->getClientScript()->registerScriptFile('/js/highlight/shCore.js', CClientScript::POS_HEAD);
Yii::app()->getClientScript()->registerScriptFile('/js/highlight/shBrushConf.js', CClientScript::POS_HEAD);
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
<p>最后一行代码分解为2部分来看:Yii::createWebApplication()和run()。Yii这个类定义在框架目录的根上yii.php。很明显这个类只是对YiiBase.php的一个包装，我们可以在yii.php按自己的需求定制。追着YiiBase.php，首先请大家快速的预览一下该文件。发现从L14-L43有着大量的常量定义。
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
接下来，继续追查YiiBase::createWebApplication()
<pre class='brush:php'>
public static function createWebApplication($config=null)
{
	return self::createApplication('CWebApplication',$config);
}
public static function createApplication($class,$config=null)
{
	return new $class($config);
}
</pre>
最终产生了一个CWebApplication实例，并调用了父类CApplication的构造方法
<pre class='brush:php'>
public function __construct($config=null)
{
	Yii::setApplication($this);	//奇特的单例方法

	// set basePath at early as possible to avoid trouble
	if(is_string($config))
		$config=require($config);//包含配置文件
	if(isset($config['basePath']))
	{
		$this-&gt;setBasePath($config['basePath']);//设置Yii::app()-&gt;basePath属性
		unset($config['basePath']);
	}
	else
		$this-&gt;setBasePath('protected');//注意：这里表明最好在配置文件中显示的定义basePath,否则系统会使用默认值
	Yii::setPathOfAlias('application',$this-&gt;getBasePath());//3个别名设置，又认识了几个别名 ^_^
	Yii::setPathOfAlias('webroot',dirname($_SERVER['SCRIPT_FILENAME']));
	Yii::setPathOfAlias('ext',$this-&gt;getBasePath().DIRECTORY_SEPARATOR.'extensions');

	$this-&gt;preinit();//父类CModule中的一个空protect方法

	$this-&gt;initSystemHandlers();//初始化异常句柄和错误句柄 TODO待研究
	$this-&gt;registerCoreComponents();//初始化核心组件。CPhpMessageSource、CDbConnection、CPhpMessageSource、
	//CErrorHandler、CSecurityManager、CStatePersister、CUrlManager、CHttpRequest、CFormatter TODO待研究

	$this-&gt;configure($config);//call CModule::configure() 迭代剩余的配置信息
	$this-&gt;attachBehaviors($this-&gt;behaviors);//绑定事件 TODO待研究
	$this-&gt;preloadComponents();//加载静态的app组件。不知道干嘛的 TODO待研究

	$this-&gt;init();//调用了实例CWebApplication::init()
}
protected function init()
{
	parent::init();//调用爷爷类CModule::init(),这是一个空方法。即这行代码执行后 什么都没发生。
	// preload 'request' so that it has chance to respond to onBeginRequest event.
	$this-&gt;getRequest();//调用父类CApplication::getRequest()
}
public function getRequest()
{
	return $this-&gt;getComponent('request');//返回一个CHttpRequest组件(核心组件)的实例
}
</pre>
<p>到现在，Yii::createWebapplication执行完毕，接下来执行了父类CApplication::run()方法
</p>
<pre class='brush:php'>
public function run()
{
	if($this-&gt;hasEventHandler('onBeginRequest'))
		$this-&gt;onBeginRequest(new CEvent($this));//绑定onBeginRequest方法
	$this-&gt;processRequest();//开始处理http请求
	if($this-&gt;hasEventHandler('onEndRequest'))
		$this-&gt;onEndRequest(new CEvent($this));//绑定onEndRequest方法
}
public function processRequest()
{
	if(is_array($this-&gt;catchAllRequest) &amp;&amp; isset($this-&gt;catchAllRequest[0]))
	{
		$route=$this-&gt;catchAllRequest[0];
		foreach(array_splice($this-&gt;catchAllRequest,1) as $name=&gt;$value)
			$_GET[$name]=$value;
	}
	else
		$route=$this-&gt;getUrlManager()-&gt;parseUrl($this-&gt;getRequest());
	
	$this-&gt;runController($route);//解析完url，执行post/index，到此结束
}
</pre>