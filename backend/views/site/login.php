<?php
$pageTitle=Yii::app()->name . ' - Login';
$breadcrumbs=array(
	'Login',
);
?>

<h1>登录</h1>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

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

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::button('登录', array('id'=>'login_btn'));?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
<script type="text/javascript">
bindEnter();
function bindEnter(){
	$('#login_btn').bind('keyup', function(event){
		   if (event.keyCode=="13"){
				$("#login_btn").click();
				return;
		   }
	});	
}
$("#login_btn").click(function () {
	var passwd = $("#LoginForm_password");
	var uname = $("#LoginForm_username");
	var uname_txt = uname.val();
	var passwd_txt =  passwd.val();
	if(passwd_txt!="")
	{
		var hash = md5(passwd_txt);
		passwd.val(hash);
	}
	$("#login-form").submit();
});
</script>