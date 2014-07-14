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
));
?>
	<h3><?php  if($model->isNewRecord){ echo 'Create';}else{echo 'Update';}?> Header Widget</h3>
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
        
    <div class="control-group"><?php ?>
        <?php echo $form->labelEx($model,'associate_logo'); ?>
        <div class="controls">
            <?php echo $form->fileField($model,'image1',array('size'=>60,'maxlength'=>255,'class' =>'image_upload','preview' =>'preview1'));?>
            <?php //echo $form->fileField($model,'image',array('size'=>60,'maxlength'=>255,'name' =>'image','class' =>'image_upload','preview' =>'preview1')); ?>
            <span class="help-block">Select an Image to be used as gallery visualization at some places. (Optional)</span>
            <?php echo $form->error($model,'image'); ?>
            <img id="preview1" src="<?php if((!$model->isNewRecord))echo $modelData->image1;?>" alt="your image" style="<?php if(($model->isNewRecord)){ ?> display:none;<?php }?>height:150px;width:150px"/>
            <?php if($model->image) { ?>
            <?php }?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'associate_logo'); ?>
        <div class="controls">
            <?php echo $form->fileField($model,'image2',array('size'=>60,'maxlength'=>255,'class' =>'image_upload','preview' =>'preview2'));?>
            <span class="help-block">Select an Image to be used as gallery visualization at some places. (Optional)</span>
            <?php echo $form->error($model,'image'); ?>
            <img id="preview2" src="<?php if((!$model->isNewRecord))echo $modelData->image2;?>" alt="your image" style="<?php if(($model->isNewRecord)){ ?> display:none;<?php }?>height:150px;width:150px"/>
            <?php if($model->image) { ?>
            <?php }?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'associate_logo'); ?>
        <div class="controls">
            <?php echo $form->fileField($model,'image3',array('size'=>60,'maxlength'=>255,'class' =>'image_upload','preview' =>'preview3'));?>
            <span class="help-block">Select an Image to be used as gallery visualization at some places. (Optional)</span>
            <?php echo $form->error($model,'image'); ?>
            <img id="preview3" src="<?php if((!$model->isNewRecord))echo $modelData->image3;?>" alt="your image" style="<?php if(($model->isNewRecord)){ ?> display:none;<?php }?>height:150px;width:150px"/>
            <?php if($model->image) { ?>
            <?php }?>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <?php echo CHtml::button($model->isNewRecord ? 'Create Widget' : 'Update Widget', array('class'=>'btn btn-primary','id'=>'submit-content')); ?>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->