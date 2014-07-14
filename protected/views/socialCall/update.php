<?php
/* @var $this SocialCallController */
/* @var $model SocialCall */

$this->breadcrumbs=array(
	'Social Calls'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SocialCall', 'url'=>array('index')),
	array('label'=>'Create SocialCall', 'url'=>array('create')),
	array('label'=>'View SocialCall', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SocialCall', 'url'=>array('admin')),
);
?>

<h1>Update SocialCall <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>