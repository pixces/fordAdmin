<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs = array(
    'Pages' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Page', 'url' => array('index')),
    array('label' => 'Manage Page', 'url' => array('admin')),
);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/themes/cnktheme/js/gallery/gallery.js', CClientScript::POS_END);
?>

<h1>Create Page</h1>

<?php $this->renderPartial('_form', array('model' => $model, 'widgets' => $widgets, 'galleries' => $galleries, 'page_widgets' => $page_widgets)); ?>
<script>
    $(function() {
        $("input[data-action='elem-title']").live('blur', function() {
            var title = $(this).val();
            if (title && title != '') {
                var sef = UTILS.createSEF(title);
                $(".sef-title").val(sef);
            }
        })
    });
</script>