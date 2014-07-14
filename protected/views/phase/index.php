<?php
/* @var $this PhaseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Phases',
);

$this->menu=array(
	array('label'=>'Create Phase', 'url'=>array('create')),
	array('label'=>'Manage Phase', 'url'=>array('admin')),
);
?>
<h1>
    <span class="pull-left">All Phases</span>
    <span class="pull-right h1-nested">
        <span class="pill pill-muted">
            <?php echo CHtml::link('<i class="icon-plus-sign"></i> Add Phase',array('create')); ?>
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
        $(".phase-action").live("click",ACTION.listAction);
    });
</script>