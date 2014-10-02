<?php $this->beginContent('/layouts/main'); ?>
<div class="site-content" >
	<a class="fork-me" href="https://github.com/straysh/s_blog">
		<img style="position: absolute; top: 0px; right: 0px; border: 0px none;" src="/images//forkme_right_darkblue_121621.png" alt="Fork me on GitHub">
	</a>
<?php echo $content; ?>

	<?php 
	$controller = Yii::app()->controller;
	$action = $controller->action;
	$requestPath = strtolower(trim($controller->id, '/')).'/'.strtolower(trim($action->id, '/'));
	if(!in_array($requestPath, array('site/index', 'site/error', 'profile/index')))
	{
		echo '<div id="disqus_thread"></div>';
	}
	?>
	
	<footer class="site-footer" id="site-footer">
		<h2 class="epsilon">创建和维护</h2>
		<ul>
			<li><a href="<?php echo Yii::app()->request->hostInfo; ?>">jobkhan Cao</a></li>
		</ul>

		<h2 class="epsilon">个人简介</h2>
		<ul>
			<li><a href="<?php echo Yii::app()->createUrl('/profile/index'); ?>">曹庭汉</a></li>
		</ul>
	
		<h2 class="epsilon">电子邮件</h2>
		<ul>
			<li><?php echo CHtml::mailto('jobhancao@gmail.com', 'jobhancao@gmail.com'); ?></li>
		</ul>

		<h2 class="epsilon">现居地</h2>
		<ul class="mbd">
			<li>北京 朝阳</li>
		</ul>
		
		<h2 class="epsilon">友情链接</h2>
		<p>
			<?php echo CHtml::link('刘强', 'http://joke568.github.com');?>
			|
			<?php echo CHtml::link('阳光BLOG', 'http://www.itshipin.com/blog/');?>
		</p>
	
		<div>
			<?php echo CHtml::link("Straysh's Blog", Yii::app()->request->hostinfo)?>
			|
			<?php echo CHtml::mailto('给我留言', 'jobhancao@gmail.com'); ?>
			|
			<div class="langSet" onclick="return false;" onmouseover="$(this).addClass('btm_link')" onmouseout="$(this).removeClass('btm_link')">
				<a href="?">Language<span class="btn_arr"><span><em>◆</em></span></span></a>
				<div class="subNav" style="display:none;">
					<p><a href="?lang=zh_CN " data-flag="3">简体中文</a></p>
					<p class="second"><a href="?lang=zh_CHT" data-flag="1">繁體中文</a></p>
					<p class="last"><a href="?lang=en_US" data-flag="2">English</a></p>
        			<p></p>
        		</div>
        	</div>
        	<br/>
        	<span>Copyright © 2012 - 2013 Straysh. All Rights Reserved</span>
		</div>
	</footer>
</div>
<?php $this->endContent(); ?>