<?php
/* @var $this SocialPostController */
/* @var $model SocialPost */

$this->breadcrumbs=array(
	'Social Posts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SocialPost', 'url'=>array('index')),
	array('label'=>'Manage SocialPost', 'url'=>array('admin')),
);
?>

<h1>Create SocialPost</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>