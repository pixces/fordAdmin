<?php

class WidgetController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    //public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Widget;

        //get the list of all widget types
        $modelTypes = WidgetType::model()->findAll();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Widget'])) {
            $model->attributes = $_POST['Widget'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
            'modelTypes' => $modelTypes,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        $criteria = new CDbCriteria; //(array('gallery_id'=>  $this->data['gallery_id']));
        $criteria->compare('id', $model->widget_type_id);

        $widgetType = WidgetType::model()->findByPk($model->widget_type_id);
        $data['widgetType'] = $model->widget_type_id;
        $data['widgetForm'] = $widgetType->form_name;
        
        $this->render('update', array(
            'model' => $model,'data' =>$data
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        //$dataProvider = new CActiveDataProvider('Widget');
        $widgets = Widget::model()->with('widgetType')->findAll();

        $this->render('index', array(
            'widgets' => $widgets,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Widget('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Widget']))
            $model->attributes = $_GET['Widget'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Widget the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Widget::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Widget $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'widget-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * loads the content form depending on the type
     */
    public function actionLoadContentForm() {
        $model = new Widget;

        if (isset($_POST['widgetType'])) {
            $data['widgetType'] = $_POST['widgetType'];
            $data['widgetForm'] = $_POST['widgetForm'];

            $this->renderPartial('_form', array('model' => $model, 'data' => $data));
            exit;
        }
    }

    /**
     * save the content
     */
    public function actionSaveContent() {
        $model = new Widget;
        if($_POST['is_new'] == 0)
            $model=$this->loadModel($_POST['widget_id']);
        
        if (isset($_POST['Widget'])) {
            $widget = $_POST['Widget']['widget_type'];
            $widget_type_id = $_POST['Widget']['widget_type_id'];
            $model->attributes = $_POST['Widget'];
            $skipEncoding = array('name', 'widget_type', 'widget_type_id', 'image','add-more-count');
            $dataEncode = array();
            if ($_FILES) {
                $imgdataEncode = $this->actionSaveLogos($_FILES, $widget);
                if($_POST['is_new'] == 0){
                   //store the old data
                    $oldData = (array) json_decode($model->data);
                    $imgdataEncode = array_merge($oldData,$imgdataEncode);
                }
                    
            }
            
            foreach ($_POST['Widget'] as $key => $value) {
                if (!in_array($key, $skipEncoding)) {
                    $dataEncode[$key] = $value;
                }
            }
            
            foreach ($dataEncode as $key =>&$val){
               
                if(isset($imgdataEncode[$key])){
                    if (strpos($key,'image') !== false) 
                    $dataEncode[$key] = $imgdataEncode[$key];
                }
            }
            
           //echo '<pre>';print_r($imgdataEncode);print_r($dataEncode);exit;
            $model->data = json_encode($dataEncode);
            if ($model->save()) {
                $text = 'Added';
                if($_POST['is_new'] == 0)
                    $text = 'Updated';
                echo 'Succesfully '.$text.' The Content';
                exit;
            } else {
                print_r($model->getErrors());
                echo 'Some Error Occuried';
                exit;
            }
        }
    }

    public function actionSaveLogos($files, $widgetType) {

        $model = new Widget;
        $imageArray = array();
        foreach ($files['Widget']['name'] as $key => $file) {
            $tempFile = htmlspecialchars($files['Widget']['name'][$key]);
            if (!empty($tempFile)) {
                $image_info = getimagesize($files['Widget']["tmp_name"][$key]);
                $image_width = $image_info[0];
                $image_height = $image_info[1];
                $thumb_width='thumb_width';
                $thumb_height='thumb_height';
                $associates = 'associates';
                if($widgetType == 'partners'){
                    $thumb_width = $widgetType."_".$thumb_width;
                    $thumb_height = $widgetType."_".$thumb_height;
                }
//                if($widgetType == 'header'){
//                     $thumb_width = $associates."_".$thumb_width;
//                     $thumb_height = $associates."_".$thumb_height;
//                }
                
                //thumb image
                $thumbImageName = ImageUpload::uploadImage($model, $key, $this->getDbConfigByKey($thumb_width), $this->getDbConfigByKey($thumb_height), 'widgetImageName', 'thumb', $key);
               
//original
                $alternativeImageName = ImageUpload::uploadImage($model, $key, $image_width, $image_height, 'widgetImageName', 'default', $key);
                
                $imageArray[$key] = $thumbImageName;
            }
        }
        return $imageArray;
    }

}
