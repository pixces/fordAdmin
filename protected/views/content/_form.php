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
        'enctype'=>'multipart/form-data',
        'class'=>'form-horizontal',
    )
)); 
?>  
	<h4>Add <?php echo ucwords(strtolower($data['type'])); ?></h4>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-danger')); ?>
    <?php echo $form->hiddenField($model,'id',array('id'=>'id')); ?>
    <?php $this->renderPartial('_form-'.$data['type'], array('model'=>$model,'data'=>$data,'form'=>$form)); ?>

<?php $this->endWidget(); ?>
</div><!-- form -->