<?php

class SocialcallController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

    protected $stream_id;

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
				'actions'=>array('makecall'),
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


    public function actionMakeCall(){
        //get the list of all active streams
        //call one at a time
        //parse and save the data to database

        $model = new SocialCall;
        $callTime = time();
        $callList = SocialCall::model()->findAll();

        foreach($callList as $i => $data){
            if ($data->stream->status == 'active'){

                //set the stream id for further use
                $this->stream_id = $data->stream->id;

                if($this->processCalls($data)){
                    //update the next call time
                    $data->last_call_time = $callTime;
                    $data->next_call_time = $callTime + $data->frequency;
                    $data->save();
                }
            }
        }
    }

    protected function processCalls($data){

        Yii::import('application.components.HybridAuthIdentity');
        $haComp = new HybridAuthIdentity();

        $postCount = 0;
//        if($data->source!="googleplus") return false;
        try {
            //prepare parameters from database
            $params['q'] = urldecode( $data->keyword_string);
            $params['count'] = $data->post_count;

            $message = "--- Processing call for ".$data->source." with search query ".$data->keyword_string." -----";
            Yii::log('', CLogger::LEVEL_ERROR, $message);

            $data->source = $data->source=="googleplus"?"google":$data->source;

            $params = $this->__social_search_params($data->source,$params);


            if($data->source=="twitter"){
                $requestMethod = 'GET';
                $callUrl = $data->base_api_url;
                $getField = '?'.http_build_query($params);
                $result = Yii::app()->twitter->setGetfield($getField)
                    ->buildOauth($callUrl,$requestMethod)
                    ->performRequest()
                    ->getResponseData();

                $response = $this->parseTwitterResponse($result);

            }   else {
                //$haComp->adapter = $haComp->hybridAuth->authenticate($data->source);
                $haComp->adapter = $haComp->hybridAuth->getAdapter($data->source);
                $haComp->adapter->getAppAccessToken();
                //print_r($haComp->adapter->getUserProfile()); exit;
                //$response = $haComp->adapter->getUserActivity("me");
                $result = $haComp->adapter->getSocialPosts($params);
                // print_r($response);
                $response = $this->parseResponse($result);
            }

            if ($response){

                $message = "---- Found ".count($response)." posts and processing data for saving for ".$data->source." ----- <br><pre>";
                Yii::log('', CLogger::LEVEL_ERROR, $message);

                if ($response){
                    foreach($response as $i => $post){
                        $postModel = new SocialPost;
                        $postModel->attributes = $post;
                        $postModel->stream_id = $this->stream_id;
                        $postModel->date_created = date("Y-m-d h:i:s");
                        $postModel->save(false);
                    }
                    $postCount = $i;
                }
            }

            $message = "--- Processed call for ".$data->source." -----";
            Yii::log('', CLogger::LEVEL_ERROR, $message);
        }  catch (Exception $e){
            //log this exception
            Yii::log('', CLogger::LEVEL_ERROR, $e->getMessage());
            return false;
        }
    }


    protected function parseResponse($response){
        if (!$response){
            return false;
        }
        $res = array();
        foreach($response as $data){
            $tmp = array();
            $tmp['post_id']             = $data->id;
            $tmp['post_text']           = $data->text;
            $tmp['post_lang']           = $data->lang;
            $tmp['post_source']         = $data->source;
            $tmp['post_url']            = $data->postUrl;
            $tmp['post_type']           = $data->type;
            $tmp['post_story_text']     = $data->postStoryText;
            $tmp['post_picture']        = $data->postPicture;
            $tmp['post_link']           = $data->postLink;
            $tmp['post_name']           = $data->postName;
            $tmp['post_caption']        = $data->postCaption;
            $tmp['post_description']    = $data->postDescription;

            $tmp['date_published']      = $data->date;
            $tmp['date_published_ts']   = $data->timestamp;
            $tmp['post_status']         = 'new';
            $tmp['source']              = $data->source;
            //$tmp['date_created']        = date("Y-m-d h:i:s");
            $tmp['post_hash']           = md5($tmp['date_published']."|".$tmp['post_url']);

            $tmp['user_category']       = $data->user->profile->photoURL;
            $tmp['user_profile_image']  = $data->user->profile->photoURL;
            $tmp['user_name']           = $data->user->profile->firstName." ".$data->user->profile->lastName;
            $tmp['user_screen_name']    = $data->user->profile->displayName;
            $tmp['user_id']             = $data->user->profile->identifier;
            $tmp['user_lang']           = $data->user->profile->language;
            $tmp['user_location']       = $data->user->profile->region;
            $tmp['user_followers_count']= $data->user->profile->followersCount;
            $tmp['user_friend_count']   = $data->user->profile->friendsCount;
            $tmp['user_status_count']   = $data->user->profile->statusCount;
            $tmp['user_url']            = $data->user->profile->profileURL;

            $res                        = array_merge($res,array($tmp));
        }
        if ($res){
            return $res;
        } else {
            return false;
        }
    }


    protected function parseTwitterResponse($response){

        if (!$response && !empty($response['statuses'])){
            return false;
        }
        $res = array();
        //print_r($response['statuses']); exit;
        foreach($response['statuses'] as $data){
            $tmp = array();
            $tmp['post_id']             = $data['id'];
            $tmp['post_text']           = $data['text'];
            $tmp['post_lang']           = $data['metadata']['iso_language_code'];
            $tmp['post_source']         = isset( $data['source']) ? strip_tags($data['source']): null;
            $tmp['user_profile_image']  = $data['user']['profile_image_url_https'];
            $tmp['user_name']           = $data['user']['name'];
            $tmp['user_screen_name']    = $data['user']['screen_name'];
            $tmp['user_id']             = $data['user']['id_str'];
            $tmp['user_lang']           = $data['user']['lang'];
            $tmp['user_location']       = $data['user']['location'];
            $tmp['user_followers_count']= $data['user']['followers_count'];
            $tmp['user_friend_count']   = $data['user']['friends_count'];
            $tmp['user_status_count']   = $data['user']['statuses_count'];
            $tmp['user_url']            = isset( $data['user']['url'] ) ? $data['user']['url'] : null;
            $tmp['date_published']      = $data['created_at'];
            $tmp['date_published_ts']   = strtotime($data['created_at']);
            $tmp['post_status']         = 'new';
            $tmp['post_type']           = 'tweet';
            $tmp['post_url']            = 'https://twitter.com/'.$tmp['user_screen_name']."/status/".$tmp['post_id'];
            $tmp['source']              = 'twitter';
            //$tmp['date_created']        = date("Y-m-d h:i:s");
            $tmp['post_hash']           = md5($tmp['date_published']."|".$tmp['post_url']);

            $res = array_merge($res,array($tmp));
        }
        if ($res){
            return $res;
        } else {
            return false;
        }
    }


    /**
     * Function to prepare social params for each social accounts
     */
    private function __social_search_params($social, $params){
        $refinedParams = array();
        $resultCount = 25;
        if($social && !empty($social)){
            switch($social){
                case 'facebook':
                    $refinedParams['q'] = $params['q'];
                    $refinedParams['type'] = isset($params['type'])?$params['type']:'post';
                    $refinedParams['limit'] = isset($params['count'])?$params['count']:$resultCount;
                    break;
                case 'twitter':
                    $refinedParams['q'] = $params['q'];
                    $refinedParams['lang'] = 'en';
                    $refinedParams['rpp'] = isset($params['count'])?$params['count']:$resultCount;
                    $refinedParams['result_type'] = isset($params['result_type'])?$params['result_type']:"mixed";
                    break;
                case 'google':
                case 'googleplus':
                    $refinedParams['query'] = $params['q'];
                    //$refinedParams['language'] = 'en-GB';  // en-US
                    $refinedParams['maxResults'] = isset($params['count'])?$params['count']:$resultCount;
                    $refinedParams['orderBy'] = "recent";
                    break;
                default:
                    $refinedParams = $params;
                    break;
            }
            return $refinedParams;
        }
        return $refinedParams;
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
		$model=new SocialCall;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SocialCall']))
		{
			$model->attributes=$_POST['SocialCall'];
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

		if(isset($_POST['SocialCall']))
		{
			$model->attributes=$_POST['SocialCall'];
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
		$dataProvider=new CActiveDataProvider('SocialCall');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SocialCall('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SocialCall']))
			$model->attributes=$_GET['SocialCall'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SocialCall the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SocialCall::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SocialCall $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='social-call-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
