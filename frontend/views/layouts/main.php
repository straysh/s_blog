<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="description" content="PHP学习和交流，以及日常笔记">
<meta name="robots" content="index,follow,archive">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="/css/reset.css">
<link rel="stylesheet" href="/css/all.css">
<link rel="stylesheet" href="/css/main.css">
<title>Straysh's Blog</title>
<link rel="icon" href="/images/favicon.ico" >
<?php 
Yii::app()->getClientScript()->registerCoreScript("jquery");
?>
</head>

<body>
<nav class="site-navigation">
	<div class="build-date">Last Updated: <?php echo date('r', filectime(Yii::app()->basePath.'/www/index.php'));?></div>
	<?php
	$data = array(
		array(
			'text'=>'<a href="#">YII</a>',
			'children'=>array(
				array('text'=>CHtml::link('博文测试', array('/article/page/category/yii/id/1'))),
				array('text'=>CHtml::link('demo blog入口分析', array('/article/page/category/yii/id/2'))),
				),
			),
		);
	$this->widget('CTreeView', 
		array(
		 	'id'=>'menu-treeview',
			'persist' => 'cookie',
			'control'=>'#treecontrol',
			'data' => $data, 
			'animated' => 'fast', 
			'htmlOptions' => array('id' => 'admin_treeview', 
			'class' => 'filetree treeplus')
		)
	);
	?>	
</nav>

<?php echo $content; ?>

</body>
</html>
