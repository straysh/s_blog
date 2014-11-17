<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="description" content="PHP学习和交流，以及日常笔记">
<meta name="robots" content="index,follow,archive">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<?php
Yii::app()->clientScript->registerCssFile('/css/main'.(YII_DEBUG?'':'_min').'.css');
Yii::app()->clientScript->registerScriptFile('/js/require.js', NULL, array('data-main' => '/js/main'.(YII_DEBUG?'':'_min')));
?>
<title>Straysh's Blog</title>
<link rel="icon" href="/images/favicon.ico" >
<script>
	var _hmt = _hmt || [];
	(function() {
		var hm = document.createElement("script");
		hm.src = "//hm.baidu.com/hm.js?05a9120284c9d52abbb86d83442f5413";
		var s = document.getElementsByTagName("script")[0];
		s.parentNode.insertBefore(hm, s);
	})();
</script>
</head>

<body>
<nav class="site-navigation">
	<div class="build-date">Last Updated: <?php echo date('r', filectime(Yii::app()->basePath.'/www/index.php'));?></div>
	<?php
		$this->renderPartial('//layouts/sidetree');
	?>
</nav>

<?php echo $content; ?>

<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1253583555'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s23.cnzz.com/z_stat.php%3Fid%3D1253583555%26show%3Dpic1' type='text/javascript'%3E%3C/script%3E"));</script>
</body>
</html>
