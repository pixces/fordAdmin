<div class="view">
    <div class="span6 pull-left meta-details">
        <img class="img-rounded" src ="<?php echo "../".Yii::app()->params->uploadPath."/thumb/".$data->thumb;?>" style='float:left;width:100px;'/>
        <?php echo CHtml::encode($data->name); ?>
    </div>
    <div class="span3 pull-right meta-action">
        right side
    </div>

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
    <?php echo CHtml::encode($data->name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('thumb')); ?>:</b>
    <img class="img-rounded" src ="<?php echo "../".Yii::app()->params->uploadPath."/thumb/".$data->thumb;?>" style='float:left;width:150px;height: 120px'/>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
    <?php echo CHtml::encode($data->description); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('order_id')); ?>:</b>
    <?php echo CHtml::encode($data->order_id); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
    <?php echo CHtml::encode($data->title); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
    <?php echo CHtml::encode($data->status); ?>
    <br /><br /><br /><br />

    <?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('is_ugc')); ?>:</b>
	<?php echo CHtml::encode($data->is_ugc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('voting_enabled')); ?>:</b>
	<?php echo CHtml::encode($data->voting_enabled); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_moderated')); ?>:</b>
	<?php echo CHtml::encode($data->is_moderated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_created')); ?>:</b>
	<?php echo CHtml::encode($data->date_created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_modified')); ?>:</b>
	<?php echo CHtml::encode($data->date_modified); ?>
	<br />

	*/ ?>

</div>