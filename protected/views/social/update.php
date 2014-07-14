<?php
/* @var $this SocialPostController */
/* @var $model SocialPost */

$this->breadcrumbs=array(
	'Social Posts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SocialPost', 'url'=>array('index')),
	array('label'=>'Create SocialPost', 'url'=>array('create')),
	array('label'=>'View SocialPost', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SocialPost', 'url'=>array('admin')),
);
?>

<h1>Update SocialPost <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>