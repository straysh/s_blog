<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<meta name="robots" content="nofollow">
	<meta name="robots" content="noarchive">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/admin_main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header" style="-moz-user-select:-moz-none; -webkit-user-select:none;" onselectstart="return false;">
		<div style="height:53px;">
		<div id="logo" style="float:left;">
			<?php echo Yii::app()->name;?>( <?php echo $_SERVER['SERVER_ADDR']; ?> )
		</div>
		</div>
	</div><!-- header -->
	<div id="mainmenu" style="-moz-user-select:-moz-none; -webkit-user-select:none;" onselectstart="return false;">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'首页', 'url'=>array('/site/index')),
				array('label'=>'关于', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'联系人', 'url'=>array('/site/contact')),
				array('label'=>'登录', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'注册', 'url'=>array('/site/reg'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'注销 ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
			),
		)); 
		?>
	</div><!-- mainmenu -->
	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer" style="-moz-user-select:-moz-none; -webkit-user-select:none;" onselectstart="return false;">
		Copyright &copy; <?php echo date('Y'); ?> by <?php echo Yii::app()->params['companyname']; ?> All Rights Reserved <?php echo Yii::app()->params['poweredby']; ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
