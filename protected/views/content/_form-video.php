    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'content-form',
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

    <?php echo $form->hiddenField($model,'author',array('id'=>'author')); ?>
    <?php echo $form->hiddenField($model,'channel_name',array('id'=>'channel_name','value'=>'youtube')); ?>
    <?php echo $form->hiddenField($model,'thumb_image',array('id'=>'thumb_image')); ?>
    <?php echo $form->hiddenField($model,'media_id',array('id'=>'media_id')); ?>
    <?php echo $form->hiddenField($model,'alternate_image',array('id'=>'alternate_image')); ?>
    <?php echo CHtml::hiddenField('hidden-url' , (!$model->isNewRecord) ?$model->media_url:'', array('id' => 'hidden-url'));?>
    <?php echo CHtml::hiddenField('is_new' , (!$model->isNewRecord) ?'0':'1', array('id' => 'is_new'));?>
    <?php echo CHtml::hiddenField('view' , (!$model->isNewRecord) ?$data['views']:'new', array('id' => 'view'));?>
    <?php echo $form->hiddenField($model,'gallery_id'); ?>
    <?php echo $form->hiddenField($model,'type',array('value' => 'video')); ?>
    <div class="control-group">
        <?php echo $form->labelEx($model,'media_url'); ?>
        <div class="controls">
            <?php echo $form->textField($model,'media_url',array('size'=>60,'maxlength'=>250,'class'=>'input-xxlarge')); ?>
            <span class="help-block">Add the Youtube / Video URL which is added to the content.</span>
            <?php echo $form->error($model,'media_url'); ?>
        </div>
    </div>
    
    <div class="control-group">
        <?php echo $form->labelEx($model,'title'); ?>
        <div class="controls">
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
            <?php echo CHtml::button($model->isNewRecord ? 'Fetch Video Content' : 'Save Text Content', array('class'=>'btn btn-primary','id'=>'submit-content','data-attr'=>$model->isNewRecord ? '0' : '1')); ?>
        
        </div>
    </div>  

    <?php $this->endWidget(); ?>