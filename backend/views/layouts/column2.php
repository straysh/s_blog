<?php
$this->beginContent('//layouts/main');
?>
<div class="span-4">
<div id="left-sidebar" style="-moz-user-select:-moz-none; -webkit-user-select:none;" onselectstart="return false;">
<?php
$this->beginWidget('zii.widgets.CPortlet', array('title' => '操作'));
	$data = array(
		'clbt' => array(
			//'unique'=>true,
			"text" =>'文章管理', 
			"classes" => "important", 
			"children" => array(
				'indexAtkl' => array('text' => CHtml::link('浏览文章', array('article/index'))),
				'viewAtkl' => array('text' => CHtml::link('预览文章', array('article/view'))),
				'atkladmin' => array('text' => CHtml::link('管理文章', array('article/admin'))),
				'createAtkl' => array('text' => CHtml::link('新增文章', array('article/create'))),
				'updateAtkl' => array('text' => CHtml::link('更新文章', array('article/update'))),
			)
		),
		

	);
	?>
	<div id="treecontrol">
		<a href="#"><?php echo Yii::t('ui','收起');?></a> |
		<a href="#"><?php echo Yii::t('ui','展开');?></a>
	</div>	
	<?php
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
	
		$this->endWidget();
	?>	
</div>
</div>

<div class="span-19 last">
	<div id="content" style="padding-left: 0px; padding-right: 0px;">
				<?php
				echo $content;
				?>
	</div>
<!-- content --></div>
<?php
$this->endContent();
?>