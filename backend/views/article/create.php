<?php
/* @var $this ArticleController */
/* @var $model Article */

// $this->breadcrumbs=array(
// 	'Articles'=>array('index'),
// 	'Create',
// );

// $this->menu=array(
// 	array('label'=>'List Article', 'url'=>array('index')),
// 	array('label'=>'Manage Article', 'url'=>array('admin')),
// );
?>

<h1>Create Article</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<script type="text/javascript" src="/js/article/load.js"></script>
<script type="text/javascript">
<!--
$().ready(function(){
	$('#load_article').click(function(){
		$.articleLoader.init(null);
	});
});
//-->
</script>