<?php
/* @var $this SocialCallController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Social Calls',
);

$this->menu=array(
	array('label'=>'Create SocialCall', 'url'=>array('create')),
	array('label'=>'Manage SocialCall', 'url'=>array('admin')),
);
?>

<h1>Social Calls</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
