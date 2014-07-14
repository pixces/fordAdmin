<?php

class PageController extends Controller {

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
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('*'),
                'users' => array('admin'),
            ),
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
        $model = new Page;
        $criteria = new CDbCriteria;
        $criteria->compare('status', 'active');

        //get all active widgets
        $widgets = Widget::model()->findAll($criteria);

        //get all active galleries
        $gallery = Gallery::model()->findAll($criteria);

        $rows = array();
        foreach ($gallery as $event) {
            $rows[$event->id] = $event->title;
        }

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Page'])) {
            $model->attributes = $_POST['Page'];
            if (!empty($_FILES['Page']['name']['thumb'])) {
                $image_info = getimagesize($_FILES["Page"]["tmp_name"]['thumb']);
                $image_width = $image_info[0];
                $image_height = $image_info[1];
                //save the thumb image
                $thumbImageName = ImageUpload::uploadImage($model, 'thumb', $this->getDbConfigByKey('thumb_width'), $this->getDbConfigByKey('thumb_height'), 'pageImageName', 'thumb');
                //original
                $alternativeImageName = ImageUpload::uploadImage($model, 'thumb', $image_width, $image_height, 'pageImageName', 'default');
                $model->thumb = $thumbImageName;
            }

            if ($model->save()) {
                //save the gallery
                if ($_POST['Page']['is_gallery'] == 1) {
                    $pageGallery = new PageGalleries;
                    $pageGallery->page_id = $model->id;
                    $pageGallery->gallery_id = $_POST['Page']['gallery_id'];
                    $pageGallery->save();
                }$order = 1;
                foreach ($_POST['Page']['widget'] as $key => $val) {
                    if (!empty($val)) {
                        $pageWidgetmodel = new PageWidgets;
                        $pageWidgetmodel->page_id = $model->id;
                        $pageWidgetmodel->widget_id = $val;
                        $pageWidgetmodel->order_id = $order;
                        $order++;
                        $pageWidgetmodel->save();
                    }
                }

                $this->redirect(array('view', 'id' => $model->id));
            }
        }
        $this->render('create', array(
            'model' => $model,
            'widgets' => $widgets,
            'galleries' => $rows,
            'page_widgets' => array(),
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
        //get all active galleries
        $criteria = new CDbCriteria;
        $criteria->compare('status', 'active');
        $gallery = Gallery::model()->findAll($criteria);
        //get all active widgets
        $widgets = Widget::model()->findAll($criteria);
        $criteria = new CDbCriteria;
        $criteria->compare('page_id', $id);
        $page_widget = PageWidgets::model()->findAll($criteria);
        $page_galleries = PageGalleries::model()->find($criteria);
        $rows = $page_widget_rows = $page_galleries_rows = array();

        foreach ($gallery as $event) {
            $rows[$event->id] = $event->title;
        }
        foreach ($page_widget as $event) {
            $page_widget_rows[] = $event->widget_id;
        }

        if (isset($_POST['Page'])) {
            $thumbImageName = $model->thumb;
            $model->attributes = $_POST['Page'];
            $model->thumb = $thumbImageName;
            
            //load model
            if (!empty($_FILES['Page']['name']['thumb'])) {
                $image_info = getimagesize($_FILES["Page"]["tmp_name"]['thumb']);
                $image_width = $image_info[0];
                $image_height = $image_info[1];
                //save the thumb image
                $thumbImageName = ImageUpload::uploadImage($model, 'thumb', $this->getDbConfigByKey('thumb_width'), $this->getDbConfigByKey('thumb_height'), 'pageImageName', 'thumb');
                //original
                $alternativeImageName = ImageUpload::uploadImage($model, 'thumb', $image_width, $image_height, 'pageImageName', 'default');
                $model->thumb = $thumbImageName;
            }

            if ($model->save()) {
                //save the gallery
                $criteria = new CDbCriteria; //(array('gallery_id'=>  $this->data['gallery_id']));
                $criteria->compare('page_id', $model->id);
                PageGalleries::model()->deleteAll($criteria);
                PageWidgets::model()->deleteAll($criteria);
                if ($_POST['Page']['is_gallery'] == 1) {
                    $pageGallery = new PageGalleries;
                    $pageGallery->page_id = $model->id;
                    $pageGallery->gallery_id = $_POST['Page']['gallery_id'];
                    $pageGallery->save();
                }$order = 1;
                foreach ($_POST['Page']['widget'] as $key => $val) {
                    if (!empty($val)) {
                        $pageWidgetmodel = new PageWidgets;
                          
                        $pageWidgetmodel->page_id = $model->id;
                        $pageWidgetmodel->widget_id = $val;
                        $pageWidgetmodel->order_id = $order;
                        $order++;
                        $pageWidgetmodel->save();
                    }
                }

                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model, 'widgets' => $widgets, 'galleries' => $rows, 'page_galleries' => $page_galleries, 'page_widget' => $page_widget_rows
        ));
    }

    /**
     *
     */
    public function actionUpdateStatus() {

        if (Yii::app()->request->isPostRequest) {
            if (isset($_POST['id']) && $_POST['data'] != '') {
                $id = $_POST['id'];
                $currentStatus = $_POST['data'];

                $model = $this->loadModel($id);
                $model->status = ($currentStatus == 'active' ? 'inactive' : 'active');
                if ($model->save()) {
                    //return the json data
                    $result = array('status' => 'success', 'message' => sprintf('Page status updated to <b>\'%s\'</b>', $model->status), 'newstatus' => $model->status);
                } else {
                    //throw error
                    $result = array('status' => 'error', 'message' => 'Cannot update Page status.');
                }
                echo CJSON::encode($result);
                Yii::app()->end();
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
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
        $dataProvider = new CActiveDataProvider('Page');

        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Page('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Page']))
            $model->attributes = $_GET['Page'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Page the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
            $model = Page::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Page $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'page-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
