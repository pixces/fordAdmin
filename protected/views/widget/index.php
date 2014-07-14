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

<div class="widget-list">
    <?php foreach($widgets as $widget){
        $widgetType = $widget->getRelated('widgetType');
    ?>
    <div class="widgetItem">
        <div class="widget-type-icon">
            <i class="<?=$widgetType->name; ?>"></i>
            <span><?=ucwords($widgetType->display_name); ?></span>
        </div>
        <span class="name"><?=str_replace('_',' ',$widget->name); ?></span>
        <div>
            <span class="btn btn-mini btn-success"><i class="icon-ok icon-white"></i></span>
            <span class="btn btn-mini"><?php echo CHtml::link('<i class="icon-pencil"></i>',array('update', 'id'=>$widget->id)); ?></span>
            <span class="btn btn-mini"><?php echo CHtml::link('<i class="icon-trash"></i>',"#", array("submit"=>array('delete', 'id'=>$widget->id), 'confirm' => 'Are you sure you want to delete this widget?')); ?></span>
        </div>
    </div>
    <?php } ?>
    <span class="clearfix"></span>
</div>