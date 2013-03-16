<?php
$breadcrumbs=array(
	'Articles'=>array('index'),
	'Create',
);

$menu=array(
	array('label'=>'List article', 'url'=>array('index')),
	array('label'=>'Manage article', 'url'=>array('admin')),
);
?>

<h1>Create article</h1>

<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'article-create-form',
		'enableAjaxValidation'=>false,
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'class_id'); ?>
		<?php echo $form->textField($model,'class_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'class_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'comesfrom'); ?>
		<?php echo $form->textField($model,'comesfrom',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'comesfrom'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'key_words'); ?>
		<?php echo $form->textField($model,'key_words',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'key_words'); ?>
	</div>

	<?php  
	$this->widget('common.modules.ckwidget.CKEditorWidget',array(
		"model"=>$model,                 # 数据模型
		"attribute"=>'content',          # 数据模型中的字段
	// 	"defaultValue"=>"",           
		"config" => array( 
			"height"=>"400px", 
			"width"=>"100%", 
			"toolbar"=>array(
				//Source源码，Save保存，NewPage新建，Preview预览，Templates模板
				array('Source'),
				//Cut剪切，Copy复制，Paste粘贴，PasteText粘贴为无格式文本，PasteFromWord从MS Word粘贴，Print打印，SpellChecker拼写检查，Scayt即时拼写检查
				array('PasteFromWord'),
				//Undo撤销，Redo重做，Find查找，Replace替换，SelectAll全选，RemoveFormat清除格式
				array('Undo', 'Redo','-', 'RemoveFormat'),
				//Form表单，Checkbox复选框，Radio单选框，TextField单选文本，Textarea多行文本，Select列表/菜单，Button按钮，ImageButton图像域，HiddenField隐藏域
				array('ImageButton'),
				//BidiLtr文字方向为从左至右，BidiRtl文字方向为从右至左
				//Bold加粗，Italic倾斜，Underline下划线，Strike删除线，Subscript下标，Superscript上标
				array('Bold','Italic','Underline','Strike','-','Subscript','Superscript'),
				//NumberedList编号列表，BulletedList项目列表，Outdent减少缩进量，Indent增加缩进量，Blockquote块引用，CreateDiv创建DIV容器
				array('NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'),
				//JustifyLeft左对齐，JustifyCenter居中，JustifyRight右对齐，JustifyBlock两端对齐
				array('JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'),
				//Link插入/编辑超链接，Unlink取消超链接，Anchor插入/编辑锚点链接
				array('Link','Unlink','Anchor'),
				//Image图像，Flash Flash，Table表格，HorizontalRule插入水平线，Smiley表情符，SpecialChar插入特殊符号，PageBreak插入分页符
				array('Table','HorizontalRule','Smiley','PageBreak'),
				//Styles样式，Format格式，Font字体，FontSize字号
				array('Styles','Format','Font','FontSize'),
				//TextColor文本颜色，BGColor背景颜色
				array('TextColor','BGColor'),
				//Maximize全屏，ShowBlocks显示区块，About关于Editor
				array('Maximize'),
				),
			"filebrowserBrowseUrl"=>'/ckfinder/ckfinder.html'   #这里很关键，设置这个后，打开上传功能和浏览服务器功能 
		), 
	) ); 
	?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>