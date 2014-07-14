<?php
/* @var $this SocialStreamController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Social Streams',
);

$this->menu=array(
	array('label'=>'Create SocialStream', 'url'=>array('create')),
	array('label'=>'Manage SocialStream', 'url'=>array('admin')),
);
?>

<h1>Social Streams</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
