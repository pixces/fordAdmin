<?php
/* @var $this WidgetController */
/* @var $model Widget */
/* @var $form CActiveForm */
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'widget-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
            'enctype'=>'multipart/form-data',
            'class'=>'form-horizontal',
        )
)); ?>
	<h3><?php  if($model->isNewRecord){ echo 'Create';}else{echo 'Update';}?> Footer Widgets</h3>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-danger')); ?>
        <?php echo CHtml::hiddenField('is_new' , (!$model->isNewRecord) ?'0':'1', array('id' => 'is_new'));?>
        <?php echo CHtml::hiddenField('widget_id' , (!$model->isNewRecord) ?$model->id:'');?>
	<?php echo $form->hiddenField($model,'widget_type_id',array('id'=>'widget_type_id')); ?>
        <?php echo $form->hiddenField($model,'widget_type',array('id'=>'widget_type_id','value'=>$data['widgetType'])); ?>
	<div class="control-group">
        <?php echo $form->labelEx($model,'Widget Name'); ?>
        <div class="controls">
            <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>250,'class'=>'input-xxlarge')); ?>
            <span class="help-block">Unique name for this widget. To be used as identifier for all internal purpose.</span>
            <?php echo $form->error($model,'name'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'social_interactions'); ?>
        <div class="controls">
            <?php echo $form->labelEx($model,'Facebook URL'); ?>
            <div class="controls">
                <?php echo $form->textField($model,'social_facebook',array('size'=>60,'maxlength'=>250,'class'=>'span6' ,'value' => (!$model->isNewRecord) ?$modelData->social_facebook:'')); ?>
            </div>
            <?php echo $form->labelEx($model,'Twitter URL'); ?>
            <div class="controls">
                <?php echo $form->textField($model,'social_twitter',array('size'=>60,'maxlength'=>250,'class'=>'span6','value' => (!$model->isNewRecord) ?$modelData->social_twitter:'')); ?>
            </div>
            <?php echo $form->labelEx($model,'Google Plus URL'); ?>
            <div class="controls">
                <?php echo $form->textField($model,'social_gplus',array('size'=>60,'maxlength'=>250,'class'=>'span6','value' => (!$model->isNewRecord) ?$modelData->social_gplus:'')); ?>
            </div>
            <?php echo $form->labelEx($model,'Instagram URL'); ?>
            <div class="controls">
                <?php echo $form->textField($model,'social_instagram',array('size'=>60,'maxlength'=>250,'class'=>'span6','value' => (!$model->isNewRecord) ?$modelData->social_instagram:'')); ?>
            </div>
            <?php echo $form->labelEx($model,'Pinterest URL'); ?>
            <div class="controls">
                <?php echo $form->textField($model,'social_pinterest',array('size'=>60,'maxlength'=>250,'class'=>'span6','value' => (!$model->isNewRecord) ?$modelData->social_pinterest:'')); ?>
            </div>
            <?php echo $form->labelEx($model,'Youtube URL'); ?>
            <div class="controls">
                <?php echo $form->textField($model,'social_youtube',array('size'=>60,'maxlength'=>250,'class'=>'span6','value' => (!$model->isNewRecord) ?$modelData->social_youtube:'')); ?>
            </div>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'footer_links'); ?>
        <div class="controls">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th class="span4">Link Label</th>
                    <th class="span12">Link URL</th>
                </tr>
                </thead>
                <tbody>
                <tr id="row-1">
                    <td class="span4"><?php echo $form->textField($model,'label[0]',array('size'=>60,'maxlength'=>250,'value' => (!$model->isNewRecord) ?$modelData->label[0]:'')); ?></td>
                    <td class="span12"><?php echo $form->textField($model,'link_url[0]',array('size'=>60,'maxlength'=>250, 'class'=>'input-xxlarge','value' => (!$model->isNewRecord) ?$modelData->link_url[0]:'')); ?></td>
                </tr>
                <tr id="row-2">
                    <td class="span4"><?php echo $form->textField($model,'label[1]',array('size'=>60,'maxlength'=>250,'value' => (!$model->isNewRecord) ?$modelData->label[1]:'')); ?></td>
                    <td class="span12"><?php echo $form->textField($model,'link_url[1]',array('size'=>60,'maxlength'=>250, 'class'=>'input-xxlarge','value' => (!$model->isNewRecord) ?$modelData->link_url[1]:'')); ?></td>
                </tr>
                <tr id="row-3">
                    <td class="span4"><?php echo $form->textField($model,'label[2]',array('size'=>60,'maxlength'=>250,'value' => (!$model->isNewRecord) ?$modelData->label[2]:'')); ?></td>
                    <td class="span12"><?php echo $form->textField($model,'link_url[2]',array('size'=>60,'maxlength'=>250, 'class'=>'input-xxlarge','value' => (!$model->isNewRecord) ?$modelData->link_url[2]:'')); ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="control-group">
        <div class="controls">
            <?php echo CHtml::button($model->isNewRecord ? 'Create Widget' : 'Update Widget', array('class'=>'btn btn-primary','id'=>'submit-content')); ?>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->