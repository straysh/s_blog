<style type="text/css">
#load_article{display:inline-block; text-decoration:none; color:#333; width: 80px;height:20px;line-height:20px; border-radius:5px;text-align:center; background: #CCC;}
#load_article:hover{cursor: pointer;}
</style>
<?php
/* @var $this ArticleController */
/* @var $model Article */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'article-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'nav_id'); ?>
		<?php echo $form->dropDownList($model,'nav_id', NavList::model()->dropDownList(), array('prompt'=>'--请选择--')); ?>
		<?php echo $form->error($model,'nav_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tid'); ?>
		<?php echo $form->textField($model,'tid',array('size'=>13,'maxlength'=>13)); ?>
		<?php echo $form->error($model,'tid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author'); ?>
		<?php echo $form->textField($model,'author',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'author'); ?>
	</div>

	<div class="row">
		<a id="load_article">load article</a>
		<?php if(isset($model->content)):?>
			<?php echo $form->labelEx($model->content,'content'); ?>
			<?php echo $form->textArea($model->content,'content', array('id'=>'article_content', 'rows'=>10, 'style'=>'width:100%;')); ?>
			<?php echo $form->error($model->content,'content'); ?>
		<?php ELSE:?>
			<?php echo CHtml::textArea('ArticleContent[content]','', array('id'=>'article_content', 'rows'=>10, 'style'=>'width:100%;')); ?>
		<?php ENDIF;?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->