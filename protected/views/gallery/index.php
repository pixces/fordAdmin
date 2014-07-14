<?php
/* @var $this GalleryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Galleries',
);

$this->menu=array(
	array('label'=>'Create New Gallery', 'url'=>array('create')),
	array('label'=>'Manage Gallery', 'url'=>array('admin')),
);
?>
<h1>
    <span class="pull-left">All Galleries</span>
    <span class="pull-right h1-nested">
        <span class="pill pill-muted">
            <?php echo CHtml::link('<i class="icon-plus-sign"></i> Add New Gallery',array('create')); ?>
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
        $(".gallery-action").live("click",ACTION.listAction);
    });
</script>