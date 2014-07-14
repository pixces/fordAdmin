<?php

class PhaseController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    //public $layout='//layouts/column2';

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
            array('allow',
                'actions'=>array('index','view'),
                'roles'=>array('adminUser','admin'), // use for listing all authors and viewing 1 author
            ),
            array('allow',
                'actions'=>array('admin'),
                'roles'=>array('adminUser','admin'), // "manage" page with search
            ),
            array('allow',
                'actions'=>array('create'),
                'roles'=>array('admin'),
            ),
            array('allow',
                'actions'=>array('update'),
                'roles'=>array('adminUser','admin'),
            ),
            array('allow',
                'actions'=>array('delete'),
                'roles'=>array('admin'),
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
        $model = new Phase;

        $criteria = new CDbCriteria;
        $criteria->compare('is_default', '1');

        //get all active widgets
        $landingPagesModel = Page::model()->findAll($criteria);

        $criteria = new CDbCriteria;
        $criteria->compare('is_default', '0');
        $associatePagesModel = Page::model()->findAll($criteria);

        $associatePages = array();
        foreach ($associatePagesModel as $event) {
            $associatePages[$event->id] = $event->name;
        }
        $landingPages = array();
        foreach ($landingPagesModel as $event) {
            $landingPages[$event->id] = $event->name;
        }

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Phase'])) {
            $model->attributes = $_POST['Phase'];

            $criteria = new CDbCriteria;
            $criteria->compare('id', $_POST['Phase']['landing_page']);

            //get page name
            $landingPagesModel = Page::model()->find($criteria);
            $model->page_id = $_POST['Phase']['landing_page'];
            $model->page_name = $landingPagesModel->seo_title;
            $model->page_label = $landingPagesModel->title;
            $model->link_type = 'landing';

            if ($model->save()) {
                //save the asscoiate pagesss....
                foreach ($_POST['Phase']['associate_page'] as $key => $value) {
                    if (!empty($value)) {
                        $criteria = new CDbCriteria;
                        $criteria->compare('id', $value);
                        //get page name
                        $landingPagesModel = Page::model()->find($criteria);
                        $model = new Phase;
                        $model->phase_name = $_POST['Phase']['phase_name'];
                        $model->page_id = $value;
                        $model->page_name = $landingPagesModel->seo_title;
                        $model->page_label = $landingPagesModel->title;
                        $model->link_type = 'associate';
                        $model->save();
                    }
                }
            }
            $this->redirect(array('index'));
        }

        $this->render('create', array(
            'model' => $model, 'landing_pages' => $landingPages, 'associate_pages' => $associatePages
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
        $criteria = new CDbCriteria;
        $criteria->compare('is_default', '1');
        //get all active widgets
        $landingPagesModel = Page::model()->findAll($criteria);

        $criteria = new CDbCriteria;
        $criteria->compare('is_default', '0');
        $associatePagesModel = Page::model()->findAll($criteria);

        $associatePages = array();
        foreach ($associatePagesModel as $event) {
            $associatePages[$event->id] = $event->name;
        }
        $landingPages = array();
        foreach ($landingPagesModel as $event) {
            $landingPages[$event->id] = $event->name;
        }
        $criteria = new CDbCriteria;
        $criteria->compare('phase_name', $model->phase_name);
        $phases = Phase::model()->findAll($criteria);
        
        if (isset($_POST['Phase'])) {
            
            $criteria = new CDbCriteria;
            $criteria->compare('phase_name', $model->phase_name);
            $phases = Phase::model()->deleteAll($criteria); 
           
            //update will happen here
            
            $criteria = new CDbCriteria;
            $criteria->compare('id', $_POST['Phase']['landing_page']);

            //get page name
            $landingPagesModel = Page::model()->find($criteria);
            $model = new Phase;
            $model->phase_name = $_POST['Phase']['phase_name'];
            $model->page_id = $_POST['Phase']['landing_page'];
            $model->page_name = $landingPagesModel->seo_title;
            $model->page_label = $landingPagesModel->title;
            $model->link_type = 'landing';

            if ($model->save()) {
                //save the asscoiate pagesss....
                foreach ($_POST['Phase']['associate_page'] as $key => $value) {
                    if (!empty($value)) {
                        $criteria = new CDbCriteria;
                        $criteria->compare('id', $value);
                        //get page name
                        $landingPagesModel = Page::model()->find($criteria);
                        $model = new Phase;
                        $model->phase_name = $_POST['Phase']['phase_name'];
                        $model->page_id = $value;
                        $model->page_name = $landingPagesModel->seo_title;
                        $model->page_label = $landingPagesModel->title;
                        $model->link_type = 'associate';
                        $model->save();
                    }
                }
            }
            $this->redirect(array('index'));
//            if ($model->save())
//                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model, 'phases'=>$phases,'landing_pages' => $landingPages, 'associate_pages' => $associatePages
        ));
    }


    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Phase', array('criteria' => array('condition' => 'link_type="landing"')));
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Phase('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Phase']))
            $model->attributes = $_GET['Phase'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Phase the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Phase::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Phase $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'phase-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    /**
     * Will always be a post request
     * also will always be an ajax call
     * @throws CHttpException
     */
    public function actionDelete()
	{

        if(Yii::app()->request->isPostRequest)
        {
            if (isset($_POST['id'])){
                $id = $_POST['id'];
                $model = $this->loadModel($id);
                $criteria = new CDbCriteria;
                $criteria->compare('phase_name', $model->phase_name);
                $phases = Phase::model()->findAll($criteria);
                $saveFlag = false;
                foreach($phases as $val){
                    $model = new Phase;
                    $model = $this->loadModel($val->id);
                    $model->status = 'deleted';
                    if($model->save())
                        $saveFlag = true;
                    
                }
                if ( $saveFlag ){
                    //return the json data
                    $result = array('status' => 'success', 'message' => sprintf('Phase %s successfully deleted.',$model->phase_name));
                } else {
                    //throw error
                    $result = array('status' => 'error', 'message' => 'Cannot Phase  gallery.');
                }
                echo CJSON::encode($result);
                Yii::app()->end();
            }
        } else {
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
        }

	}
     /**
     *
     */
    public function actionUpdateStatus(){

        if(Yii::app()->request->isPostRequest)
        {
            if (isset($_POST['id']) && $_POST['data'] != ''){
                $id = $_POST['id'];
                $currentStatus = $_POST['data'];
                $model = $this->loadModel($id);
                $criteria = new CDbCriteria;
                $criteria->compare('phase_name', $model->phase_name);
                $phases = Phase::model()->findAll($criteria);
                $saveFlag = false;
                foreach($phases as $val){
                    $model = $this->loadModel($val->id);
                    $model->status = ($currentStatus == 'active' ? 'inactive' : 'active');
                    if($model->save())
                        $saveFlag = true;
                    
                }
                
                if ($saveFlag){                    
                    //return the json data
                    $result = array('status' => 'success', 'message' => sprintf('Phase status updated to <b>\'%s\'</b>', $model->status), 'newstatus' => $model->status);
                } else {
                    //throw error
                    $result = array('status' => 'error', 'message' => 'Cannot update search keyword status.');
                }
                echo CJSON::encode($result);
                Yii::app()->end();
            }
        } else {
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
        }
    }
}
