<?php
/* @var $this WidgetController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Widgets',
);

$this->menu=array(
	array('label'=>'Create Widget', 'url'=>array('create')),
	//array('label'=>'Manage Widget', 'url'=>array('admin')),
);
?>
<h1>
    <span class="pull-left">Widgets</span>
    <span class="pull-right h1-nested">
        <span class="pill pill-muted">
            <?php echo CHtml::link('<i class="icon-plus-sign"></i> Create Widget',array('create')); ?>
        </span>
    </span>
    <span class="clearfix"></span>
</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
)); ?>
