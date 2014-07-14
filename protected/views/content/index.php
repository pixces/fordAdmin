<?php
/* @var $this ContentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Contents',
);

$this->menu=array(
	array('label'=>'Create Content', 'url'=>array('create','gallery_id' =>$data['gallery_id'])),
	//array('label'=>'Manage Content', 'url'=>array('admin')),
);
?>

<h1>Contents</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
