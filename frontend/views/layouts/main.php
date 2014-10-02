<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="description" content="PHP学习和交流，以及日常笔记">
<meta name="robots" content="index,follow,archive">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="/css/main.css">
<link rel="stylesheet" href="/css/highlight/monokai_sublime.css">
<script data-main="/js/main" src="/js/require.js"></script>
<title>Straysh's Blog</title>
<link rel="icon" href="/images/favicon.ico" >
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
