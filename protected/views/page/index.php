<?php
/* @var $this PageController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pages',
);

$this->menu=array(
	array('label'=>'Create Page', 'url'=>array('create')),
	array('label'=>'Manage Page', 'url'=>array('admin')),
);
?>

<h1>
    <span class="pull-left">All Pages</span>
    <span class="pull-right h1-nested">
        <span class="pill pill-muted">
            <?php echo CHtml::link('<i class="icon-plus-sign"></i> Create New Page',array('create')); ?>
        </span>
    </span>
    <span class="clearfix"></span>
</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<script>
    $(function() {
        $(".page-action").live("click",ACTION.listAction);
    });
</script>
