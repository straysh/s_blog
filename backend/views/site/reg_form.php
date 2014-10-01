<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'susr-reg-reg_form-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><span class="required">*</span> 表示必填。</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'repassword'); ?>
		<?php echo $form->passwordField($model, 'repassword'); ?>
		<?php echo $form->error($model,'repassword'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::button('注册', array('id'=>'reg_btn'));?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
bindEnter();
function bindEnter(){
	$('#reg_btn').bind('keyup', function(event){
		   if (event.keyCode=="13"){
				$("#reg_btn").click();
				return;
		   }
	});	
}
$("#reg_btn").click(function () {
	var uname = $("#LoginForm_username");
	var passwd = $("#LoginForm_password");
	var repasswd = $("#LoginForm_repassword");
	
	var uname_txt = uname.val();
	var passwd_txt =  passwd.val();
	var repasswd_txt = repasswd.val();
	if(passwd_txt!="" && passwd_txt==repasswd_txt)
	{
		var hash = md5(passwd_txt);
		passwd.val(hash);
		repasswd.val(hash);
	}
	$("#susr-reg-reg_form-form").submit();
});
</script>