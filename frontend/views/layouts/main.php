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

</body>
</html>
