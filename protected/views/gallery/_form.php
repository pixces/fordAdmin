<?php
/* @var $this GalleryController */
/* @var $model Gallery */
/* @var $form CActiveForm */
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/themes/cnktheme/js/gallery/gallery.js',CClientScript::POS_END);
?>

<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'gallery-form',
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
    <?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-danger')); ?>
    <div class="control-group">
        <?php echo $form->labelEx($model,'name'); ?>
        <div class="controls">
            <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128,'class'=>'input-xxlarge')); ?>
            <span class="help-block">All contents will be identified by the gallery name</span>
            <?php echo $form->error($model,'name'); ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model,'title'); ?>
        <div class="controls">
            <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128,'class'=>'input-xxlarge')); ?>
            <span class="help-block">(Optional)</span>
            <?php echo $form->error($model,'title'); ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model,'description'); ?>
        <div class="controls">
            <?php echo $form->textArea($model,'description',array('maxlength'=>255, 'rows'=>7, 'class'=>'input-xxlarge')); ?>
            <span class="help-block">(Optional)</span>
            <?php echo $form->error($model,'description'); ?>
        </div>
    </div>

    <?php if($model->isNewRecord) { ?>

    <div class="control-group">
        <?php echo $form->labelEx($model,'thumb'); ?>
        <div class="controls">
            <?php echo $form->fileField($model,'thumb',array('size'=>60,'maxlength'=>255,'class' =>'image_upload')); ?>
            <span class="help-block">Select an Image to be used as gallery visualization at some places. (Optional)</span>
            <?php echo $form->error($model,'thumb'); ?>
            <img id="preview" src="<?php if($model->thumb)echo Yii::app()->baseUrl."/".Yii::app()->params->uploadPath."/thumb/".$model->thumb;?>" alt="your image" style="<?php if(!$model->thumb){ ?> display:none;<?php }?>height:150px;width:150px"/>
            <?php if($model->thumb) { ?>
            <?php }?>
        </div>
    </div>

    <?php } else { ?>

    <div class="control-group">
        <?php echo $form->labelEx($model,'thumb'); ?>
        <div class="controls">
            <?php echo $form->hiddenField($model,'thumb'); ?>
                        <?php echo $form->fileField($model,'thumb',array('size'=>60,'maxlength'=>255,'class' =>'image_upload')); ?>

            <img id="preview" src="<?php echo $model->thumb; ?>" alt="your image" style="<?php if(!$model->thumb){ ?> display:none;<?php }?>height:150px;width:150px"/>
        </div>
    </div>

    <?php } ?>
    <div class="control-group">
        <label class="control-label"></label>
        <div class="controls">
            <label class="checkbox inline">
                <?php echo $form->checkBox($model,'is_ugc'); ?>
                <?php echo $form->labelEx($model,'is_ugc'); ?>
            </label>
            <label class="checkbox inline">
                <?php echo $form->checkBox($model,'voting_enabled'); ?>
                <?php echo $form->labelEx($model,'voting_enabled'); ?>
            </label>
            <label class="checkbox inline">
                <?php echo $form->checkBox($model,'is_moderated'); ?>
                <?php echo $form->labelEx($model,'is_moderated'); ?>
            </label>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Add Gallery' : 'Save Gallery Details', array('class'=>'btn btn-primary')); ?>
        </div>
    </div>
<?php $this->endWidget(); ?>
</div><!-- form -->
