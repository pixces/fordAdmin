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
	<h3><?php  if($model->isNewRecord){ echo 'Create';}else{echo 'Update';}?> Small Content</h3>
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
        <?php echo $form->labelEx($model,'Content Title'); ?>
        <div class="controls">
            <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>250,'class'=>'input-large','value' => (!$model->isNewRecord) ?$modelData->title:'')); ?>
            <span class="help-block">Add the title that goes with the content</span>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'Content Text'); ?>
        <div class="controls">
            <?php echo $form->textArea($model,'content',array('maxlength'=>255, 'rows'=>5, 'class'=>'input-xxlarge','value' => (!$model->isNewRecord) ?$modelData->content:'')); ?>
            <span class="help-block">Small text to be displayed on front end. Not more than 250 chars will be displayed.</span>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'Hyperlink Label'); ?>
        <div class="controls">
            <?php echo $form->textField($model,'label',array('size'=>60,'maxlength'=>250,'class'=>'input-xlarge','value' => (!$model->isNewRecord) ?$modelData->label:'')); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'Hyperlink URL'); ?>
        <div class="controls">
            <?php echo $form->textField($model,'link_url',array('size'=>60,'maxlength'=>250,'class'=>'input-xxlarge','value' => (!$model->isNewRecord) ?$modelData->link_url:'')); ?>
        </div>
    </div>


    <div class="control-group">
        <div class="controls">
            <?php echo CHtml::button($model->isNewRecord ? 'Create Widget' : 'Update Widget', array('class'=>'btn btn-primary','id'=>'submit-content')); ?>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->