<?php
/* @var $this WidgetController */
/* @var $model Widget */

$this->breadcrumbs=array(
	'Widgets'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Widget', 'url'=>array('index')),
	array('label'=>'Manage Widget', 'url'=>array('admin')),
);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/themes/cnktheme/js/gallery/gallery.js',CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/themes/cnktheme/js/widget/widget.js',CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/themes/cnktheme/js/gallery/jquery.form.js',CClientScript::POS_END);
?>
<h1>Create Widget</h1>
<ul class="widget-tabs tab">
    <?php foreach ($modelTypes as $type){ ?>
        <li>
            <a class="add-cnt" form-attr="<?=$type->form_name; ?>" name-attr="<?=$type->name; ?>" id-attr="<?=$type->id; ?>" rel="#<?=$type->name; ?>">
                <i class="<?=$type->name; ?>"></i>
                <span><?=ucwords($type->display_name); ?></span>
            </a>
        </li>
    <?php } ?>
</ul>


<?php //foreach ($modelTypes as $type){
     //echo CHtml::button('Add'. ucwords($type->display_name), array('class'=>'add-cnt','id-attr'=>$type->id,'name-attr'=>$type->name,'form-attr'=>$type->form_name))."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    //}
?>
<div class="content-form-container">
</div>