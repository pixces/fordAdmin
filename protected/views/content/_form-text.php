<?php
/* @var $this ContentController */
/* @var $model Content */
/* @var $form CActiveForm */
?>

<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'content-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array(
            'class'=>'form-horizontal',
        )
    ));
    ?>
    <?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-danger')); ?>
    <!--
        Add all the hidden fields here
        //Gallery_id
        //user_id = current admin
    //-->
    <?php echo $form->hiddenField($model,'gallery_id'); ?>
    <?php echo $form->hiddenField($model,'type',array('value' => 'text')); ?>
    <div class="control-group">
        <?php echo $form->labelEx($model,'title'); ?>
        <div class="controls">
            <?php echo CHtml::hiddenField('is_new' , (!$model->isNewRecord) ?'0':'1', array('id' => 'is_new'));?>
            <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>250,'class'=>'input-xxlarge')); ?>
            <span class="help-block">Add text title. Mandatory</span>
            <?php echo $form->error($model,'title'); ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model,'description'); ?>
        <div class="controls">
            <?php echo $form->textArea($model,'description',array('rows'=>7, 'class'=>'input-xxlarge')); ?>
            <span class="help-block">Add details. Mandatory</span>
            <?php echo $form->error($model,'description'); ?>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <?php echo CHtml::button($model->isNewRecord ? 'Add Text Content' : 'Save Text Content', array('class'=>'btn btn-primary','id'=>'submit-content')); ?>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->