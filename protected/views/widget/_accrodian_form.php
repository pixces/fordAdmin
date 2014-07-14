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
        <h3><?php  if($model->isNewRecord){ echo 'Create';}else{echo 'Update';}?> Accrodian Widget</h3>
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
        <?php echo $form->labelEx($model,'Content'); ?>
        <div class="controls add-more-cont">
            
            <?php 
                    if((!$model->isNewRecord)){
                        $count=1;
                        foreach ($modelData->title as $key =>$data){ 
                            if(!empty($data) && !empty($modelData->content[$key])){
                            ?>
                            <div class="section-accrodian" style="margin-bottom: 10px">
                            <span>Section - <?php echo $count;?></span><br />
                            <?php echo $form->textField($model,'title[]',array('size'=>60,'maxlength'=>250,'class'=>'input-xxlarge','value' => (!$model->isNewRecord) ?$data:'')); ?><br />
                            <?php echo $form->textArea($model,'content[]',array('rows'=>5, 'class'=>'input-xxlarge','value' => (!$model->isNewRecord) ?$modelData->content[$key]:'')); ?>
                            <?php 
                                $addMore = false;
                                if($count == count($modelData->title)){
                                    $addMore = true;
                                    
                                }else if($count == count($modelData->title)-1){
                                    $addMore = true;
                                }if($addMore){?>
                            <span  class='add-more' ><i class="icon-plus-sign"></i> </span>
                            <?php }?>
                            </div>
                        <?php $count++;}}
                    }else{
            ?>
            <div class="section-accrodian" style="margin-bottom: 10px">
                <span>Section - 1</span><br />
                <?php echo $form->textField($model,'title[]',array('size'=>60,'maxlength'=>250,'class'=>'input-xxlarge','value' => (!$model->isNewRecord) ?$modelData->title[0]:'')); ?><br />
                <?php echo $form->textArea($model,'content[]',array('rows'=>5, 'class'=>'input-xxlarge','value' => (!$model->isNewRecord) ?$modelData->content[0]:'')); ?>
            </div>
            <div class="section-accrodian" style="margin-bottom: 10px">
                <span>Section - 2</span><br />
                <?php echo $form->textField($model,'title[]',array('size'=>60,'maxlength'=>250,'class'=>'input-xxlarge','value' => (!$model->isNewRecord) ?$modelData->title[1]:'')); ?><br />
                <?php echo $form->textArea($model,'content[]',array('rows'=>5, 'class'=>'input-xxlarge','value' => (!$model->isNewRecord) ?$modelData->content[1]:'')); ?>
            </div>
            <div class="section-accrodian" style="margin-bottom: 10px">
                <span>Section - 3</span><br />
                <?php echo $form->textField($model,'title[]',array('size'=>60,'maxlength'=>250,'class'=>'input-xxlarge','value' => (!$model->isNewRecord) ?$modelData->title[2]:'')); ?><br />
                <?php echo $form->textArea($model,'content[]',array('rows'=>5, 'class'=>'input-xxlarge','value' => (!$model->isNewRecord) ?$modelData->content[2]:'')); ?>
            </div>
            <div class="section-accrodian" style="margin-bottom: 10px">
                <span>Section - 4</span><br />
                <?php echo $form->textField($model,'title[]',array('size'=>60,'maxlength'=>250,'class'=>'input-xxlarge','value' => (!$model->isNewRecord) ?$modelData->title[3]:'')); ?><br />
                <?php echo $form->textArea($model,'content[]',array('rows'=>5, 'class'=>'input-xxlarge','value' => (!$model->isNewRecord) ?$modelData->content[3]:'')); ?>
            </div>
            <div class="section-accrodian" style="margin-bottom: 10px">
                <span>Section - 5</span><br />
                <?php echo $form->textField($model,'title[]',array('size'=>60,'maxlength'=>250,'class'=>'input-xxlarge','value' => (!$model->isNewRecord) ?$modelData->title[4]:'')); ?><br />
                <?php echo $form->textArea($model,'content[]',array('rows'=>5, 'class'=>'input-xxlarge','value' => (!$model->isNewRecord) ?$modelData->content[4]:'')); ?>
                <span  class='add-more' ><i class="icon-plus-sign"></i> </span>
            </div>
            <?php }?>
            <div style="display:none" class='hide-cont'>
            <div class="section-accrodian" style="margin-bottom: 10px;" id='hidden-accrodian'>
                <span id='section-counter' data-attr ='<?php echo ($model->isNewRecord)? '5':$count;?>'>Section - <span id='section-count'><?php echo ($model->isNewRecord)? '6':$count;?></span></span><br />
                <?php echo $form->textField($model,'title[]',array('size'=>60,'maxlength'=>250,'class'=>'input-xxlarge')); ?><br />
                <?php echo $form->textArea($model,'content[]',array('rows'=>5, 'class'=>'input-xxlarge')); ?>
                <span  class='add-more' ><i class="icon-plus-sign"></i> </span>
            </div>
            </div>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <?php echo CHtml::button($model->isNewRecord ? 'Create Widget' : 'Update Widget', array('class'=>'btn btn-primary','id'=>'submit-content')); ?>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
    