<?php

class UsersController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
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
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','screening','shortlist','winner','exportcsv'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('create','update','admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Users;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Users');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Users('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Users the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Users $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionScreening()
    {
        //get the list of all users who are users active and is_verified
        $condition = " t.status = 'active' AND ";
        $condition .= " t.role = 'user' AND ";
        $condition .= " t.is_verified = '1' ";

        $uType = isset($_GET['uType']) ? $_GET['uType'] : 'nShortlist';
        $userName = isset($_GET['uname']) ? $_GET['uname']:'';
           
        //check to see if only shortlisted profiles are requested
        if (isset($uType)){
            switch ($uType){
                case 'shortlist':
                    $condition .= " AND t.is_shortlisted = '1' AND t.is_winner = '0' ";
                    break;
                case 'winner' :
                    $condition .= " AND t.is_winner = '1' ";
                    break;
                case 'nShortlist':
                    $condition .= " AND t.is_shortlisted = '0' AND t.is_winner = '0' ";
            }
            if(!empty($userName)){
                $condition .= " AND (t.first_name LIKE '%$userName%' OR t.last_name LIKE '%$userName%' OR concat_ws(' ',t.first_name,t.last_name) LIKE '%$userName%')";
            }
            
        }
        $dataProvider = new CActiveDataProvider('Users',array(
            'criteria' => array(
                'with' => array('userProfiles','contents'),
                'condition' => $condition,
                'order' => 't.date_created DESC',
                //'params'=>array(
                //    ':galleryId' => $this->loadModel($id)->id
                //),
            ),
            'pagination' => array('pageSize'=>50),
        ));
        $this->render('screening',array(
            'dataProvider'=>$dataProvider,
            'selectedType' => $uType,
            'userName' =>$userName
        ));
    }

    public function actionShortlist(){

        if(Yii::app()->request->isPostRequest)
        {
            if ( isset($_POST['id']) && $_POST['data'] != '' ){
                $id = $_POST['id'];
                $shortlist = $_POST['data'];
                $model = $this->loadModel($id);
                $model->is_shortlisted = ($shortlist == '0' ? '1' : '0');
                if ( $model->save() ){
                    //return the json data
                    $result = array('status' => 'success', 'message' => sprintf('User <b>\'%s\'</b> Shortlist status updated.', $model->first_name), 'newstatus' => $model->is_shortlisted);
                } else {
                    //throw error
                    $result = array('status' => 'error', 'message' => 'Cannot update users Shortlist information.');
                }
                echo CJSON::encode($result);
                Yii::app()->end();
            }
        } else {
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
        }
        
    }

    public function actionWinner(){

        if(Yii::app()->request->isPostRequest)
        {
            if ( isset($_POST['id']) && $_POST['data'] != '' ){
                $id = $_POST['id'];
                $winnerStatus = $_POST['data'];
                $model = $this->loadModel($id);
                $model->is_winner = ($winnerStatus == '0' ? '1' : '0');
                if ( $model->save() ){
                    //return the json data
                    $result = array('status' => 'success', 'message' => sprintf('User <b>\'%s\'</b> Winner status updated.', $model->first_name), 'newstatus' => $model->is_winner);
                } else {
                    //throw error
                    $result = array('status' => 'error', 'message' => 'Cannot update users Winner information.');
                }
                echo CJSON::encode($result);
                Yii::app()->end();
            }
        } else {
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
        }
    }



    public function actionExportCsv() {

       Yii::import('ext.ECSVExport');
        $sql = "SELECT
                  up.user_id, up.full_name, t.email, up.mobile, up.occupation,
                  up.passport, up.passport_number, up.passport_authority, up.passport_expiry,
                  up.interview_location, up.interview_address,
                  up.travel_frequency, up.countries_visited, up.sports_certificate, up.certificate_details
              FROM users t
              LEFT JOIN user_profiles up ON (up.user_id = t.id)
              WHERE t.is_shortlisted =1
                    AND up.interview_location IS NOT NULL
              ";

        $provider = Yii::app()->db->createCommand($sql)->queryAll();
        $csv = new ECSVExport($provider);
        $content = $csv->toCSV();	
        Yii::app()->getRequest()->sendFile("shortlistUser", $content, "text/csv", false);
        exit();
        
    }


}
