<?php
/* @var $this SocialStreamController */
/* @var $model SocialStream */

$this->breadcrumbs=array(
	'Social Streams'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SocialStream', 'url'=>array('index')),
	array('label'=>'Create SocialStream', 'url'=>array('create')),
	array('label'=>'View SocialStream', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SocialStream', 'url'=>array('admin')),
);
?>

<h1>Update SocialStream <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>