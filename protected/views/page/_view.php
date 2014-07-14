<?php
/* @var $this PageController */
/* @var $data Page */
?>

<!--
<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seo_title')); ?>:</b>
	<?php echo CHtml::encode($data->seo_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_default')); ?>:</b>
	<?php echo CHtml::encode($data->is_default); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('environment_id')); ?>:</b>
	<?php echo CHtml::encode($data->environment_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('thumb')); ?>:</b>
	<?php echo CHtml::encode($data->thumb); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('share_text')); ?>:</b>
	<?php echo CHtml::encode($data->share_text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('theater_share_text')); ?>:</b>
	<?php echo CHtml::encode($data->theater_share_text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('share_url')); ?>:</b>
	<?php echo CHtml::encode($data->share_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('header')); ?>:</b>
	<?php echo CHtml::encode($data->header); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('footer')); ?>:</b>
	<?php echo CHtml::encode($data->footer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('partners')); ?>:</b>
	<?php echo CHtml::encode($data->partners); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_created')); ?>:</b>
	<?php echo CHtml::encode($data->date_created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_modified')); ?>:</b>
	<?php echo CHtml::encode($data->date_modified); ?>
	<br />

	*/ ?>

</div>
-->

<div id="page-<?=$data->id; ?>" class="view list-panel item media">
    <a class="pull-left" href="#">
        <img class="img-polaroid img-thumb" src="<?php echo $data->thumb;?>">
    </a>
    <div class="media-body pull-left">
        <section>
            <span class="title"><?php echo CHtml::encode($data->name); ?></span>
        </section>
        <p><?php echo substr( CHtml::encode($data->description), 0, 250).' [..]'; ?></p>
        <div class="muted">
            <span>
                <span>Page Url: </span>
                <span></span>
            </span>
            <span>
                <span>Distribution Points: </span>
                <span></span>
            </span>
            <span>
                <span>Modified By: </span>
                <span></span>
            </span>
            <span>
                <span>Is Landing Page: </span>
                <span></span>
            </span>
        </div>
    </div>
    <div class="media-action pull-right">
        <span><i class="icon-calendar"></i> <?=date('r', strtotime($data->date_modified)); ?></span>
            <span class="button-bar">
                <?php $btnType = ($data->status == 'active') ? 'btn-success' : ( ($data->status == 'inactive') ? 'btn-danger' : 'btn-warning'); ?>
                <button class="page-action btn btn-small <?=$btnType; ?>" type="button" data-type="page" data-action="change-status" id="<?=$data->id; ?>" data-value="<?=$data->status; ?>" title="Click to Change Status"><?=ucwords($data->status); ?></button>
                <?php echo CHtml::link('<i class="icon-pencil"></i> Edit', array('update', 'id'=>$data->id),array(
                    'class'=>"btn btn-mini",
                    'data-type'=>"page",
                    'data-action'=>"edit",
                    'id'=>$data->id,
                    'title'=>"Edit Page",
                )); ?>
                <a href="javascript:void(0);" class="page-action btn btn-mini" data-type="page" data-action="delete" id="<?=$data->id; ?>" data-value="<?=$data->title; ?>" title="Delete page <?=$data->title; ?>"><i class="icon-trash"></i> Delete</a>
            </span>
    </div>
</div>