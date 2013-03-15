<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'article-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'uid'); ?>
		<?php echo $form->textField($model,'uid',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'uid'); ?>
	</div>

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
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
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

	<div class="row">
		<?php echo $form->labelEx($model,'hits'); ?>
		<?php echo $form->textField($model,'hits',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'hits'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'m_time'); ?>
		<?php echo $form->textField($model,'m_time',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'m_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_time'); ?>
		<?php echo $form->textField($model,'c_time',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'c_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->