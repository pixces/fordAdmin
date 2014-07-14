<?php
/* @var $this SocialStreamController */
/* @var $model SocialStream */
/* @var $form CActiveForm */
?>
<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // See class documentation of CActiveForm for details on this,
        // you need to use the performAjaxValidation()-method described there.
        'enableAjaxValidation'=>false,
        'id'=>'social-stream-form',
        'method'=>'POST',
        'htmlOptions' => array(
            'class'=>'form-horizontal',
        )
    )); ?>
    <?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-danger')); ?>
    <div class="control-group">
        <?php echo $form->labelEx($model,'keyword', array('class'=>'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'keyword',array('class'=>'input-xxlarge','placeholder'=>'Enter Search Term' )); ?>
            <br>
            <label class="checkbox inline">
                <?php echo $form->checkBox($model,'is_phrase'); ?>
                <?php echo $form->labelEx($model,'is_phrase'); ?>
            </label>
            <label class="checkbox inline">
                <?php echo $form->checkBox($model,'is_profile'); ?>
                <?php echo $form->labelEx($model,'is_profile'); ?>
            </label>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Source</label>
        <div class="controls">
            <label class="checkbox inline">
                <?php echo $form->checkBox($model,'is_twitter',array('checked'=>'checked')); ?>
                <?php echo $form->labelEx($model,'is_twitter'); ?>
            </label>
            <label class="checkbox inline">
                <?php echo $form->checkBox($model,'is_facebook'); ?>
                <?php echo $form->labelEx($model,'is_facebook'); ?>
            </label>
            <label class="checkbox inline">
                <?php echo $form->checkBox($model,'is_gplus'); ?>
                <?php echo $form->labelEx($model,'is_gplus'); ?>
            </label>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <?php echo CHtml::submitButton('Add Search Stream', array('class'=>'btn btn-primary')); ?>
        </div>
    </div>
    <?php $this->endWidget(); ?>

</div><!-- form -->