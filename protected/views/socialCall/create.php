<?php
/* @var $this SocialCallController */
/* @var $model SocialCall */

$this->breadcrumbs=array(
	'Social Calls'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SocialCall', 'url'=>array('index')),
	array('label'=>'Manage SocialCall', 'url'=>array('admin')),
);
?>

<h1>Create SocialCall</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>