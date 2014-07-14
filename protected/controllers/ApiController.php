<?php

class ApiController extends Controller
{

    /**
     * Key which has to be in HTTP USERNAME and PASSWORD headers
     */
    Const APPLICATION_ID = 'CNKAPP';

    /**
     * Default response format
     * either 'json' or 'xml'
     */
    private $format = 'json';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array();
    }

    /**
     * List Action
     * /api/v1/<model>/?limit=x&offset=x&gallery=x
     * Gallery to be used for Content access
     */
    public function actionList()
    {
        // Get the respective model instance
        $model = $_GET['model'];
        $limit = (isset($_GET['limit']) ? $_GET['limit'] : 20);
        $offset = (isset($_GET['offset']) ? $_GET['offset'] : 0);
        $gallery_id = (isset($_GET['gallery']) ? $_GET['gallery'] : null);
        $callback = (isset($_GET['callback'])) ? $_GET['callback'] : null;


        //default order
        $order = 'date_created DESC';

        $criteria=new CDbCriteria;
        $criteria->limit = $limit;
        $criteria->offset = $offset;
        $criteria->order = $order;
        
        switch($model)
        {
            case 'widget':

                if (isset($_GET['widget_type_id'])){
                    $value = $_GET['widget_type_id'];
                    $field = 'widget_type_id';
                }

                $criteria=new CDbCriteria;
                $criteria->limit = 1;
                $models = Widget::model()->findByAttributes(
                                array($field=>$value),
                                array('limit'=>'1'),
                                array('order'=>'id ASC')
                            );
                $this->_sendResponse(200, CJSON::encode($models));
                break;
            case 'widgetType':
                $criteria=new CDbCriteria;
                $criteria->condition = "status = :status";
                $criteria->params = array(':status' => 'active');
                $models = WidgetType::model()->findAll($criteria);
                break;
            case 'page':
                //get page by sef
                //get page by id

                break;
            case 'phase':
                if (isset($_GET['status'])){
                    $criteria->condition = "status = :status";
                    $criteria->params = array(":status" => $_GET['status']);
                } else if (isset($_GET['phase_name'])){
                    $criteria->condition = "phase_name = :name";
                    $criteria->params = array(":name" => $_GET['phase_name']);
                }
                $criteria->order = 'id ASC';

                $models = Phase::model()->findAll($criteria);
                break;
            case 'content':
                if (!isset($gallery_id) || empty($gallery_id) ){
                    $this->_sendResponse(500, 'Error: Parameter Gallery Id is missing.' );
                }

                //default status and sort order of the list
                $status = 'approved';
                $orderBy = 't.id DESC';

                //type of request UGC|Gallery
                $type = isset($_GET['type']) && !empty($_GET['type']) ? $_GET['type'] : 'gallery';

                //set the mode popular|latest
                $mode = isset($_GET['mode']) && !empty($_GET['mode']) ? $_GET['mode'] : 'none';

                //limit -1(all)|count
                $limit = isset( $_GET['limit']) && !empty($_GET['limit']) ? $_GET['limit'] : 30 ;

                //set the offset
                $offset = isset( $_GET['offset']) && !empty($_GET['offset']) ? $_GET['offset'] : 0;

                //username - name of the user submitting content
                $username = isset( $_GET['username']) && !empty($_GET['username']) ? $_GET['username'] : '';

                $contentType = isset( $_GET['content_type']) && !empty($_GET['content_type']) ? $_GET['content_type'] : '';

                //set the status and order by
                if ($type == 'gallery'){
                    $status = 'active';
                } else if ($type == 'UGC'){
                    if ($mode == 'popular'){
                        $orderBy = 't.vote DESC';
                    } else if ($mode == 'latest'){
                        $orderBy = 't.date_created DESC';
                    } else {
                        $orderBy = 't.id DESC';
                    }
                }

                $condition = " t.gallery_id = :galleryId ";

                if ($contentType){
                    $typeWhr = array();
                    foreach($contentType as $cType){
                        if(strtolower($cType) == 'blog'){
                            $typeWhr[] = " t.type IN ('text','blog') ";
                        } else if(strtolower($cType) == 'file'){
                            $typeWhr[] = " t.type IN ('ppt','pdf','doc') ";
                        } else {
                            $typeWhr[] = " t.type = '".$cType."' ";
                        }
                    }

                    $condition .= " AND ( ".implode($typeWhr,' OR ').") ";
                }

                if ($username){
                    $condition .= " AND ( user.first_name like '%".$username."%' OR user.last_name like '%".$username."%' ) ";
                }

                if ($status){
                    $condition .= " AND t.status = '".$status."'" ;
                }


                //setting up the criteria
                $criteria=new CDbCriteria;
                $criteria->with = 'user';
                $criteria->order = $orderBy;

                //set limit
                if ($limit && $limit != '-1'){
                    $criteria->limit = $limit;
                }

                //set offest
                if ($offset){
                    $criteria->offset = $offset;
                }
                //$gallery_id = 4;
                $criteria->condition = $condition;
                $criteria->params = array(':galleryId' => $gallery_id );
                //echo '<pre>';print_r($criteria);exit;
                $model = Content::model()->findAll($criteria);

                $models = array();
                if ($model){
                    foreach($model as $content){

                        //get the user details
                        //$user = User::model()->findByPk($content->user_id);
                        $content->author = $content->user->first_name." ".$content->user->last_name;

                        //replace the http image path to https
                        if ($content->thumb_image){
                            $content->thumb_image = str_replace( 'http://', 'https://', $content->thumb_image );
                        }
                        $models[] = $content;
                    }
                }

                break;
            case 'social':
                $criteria=new CDbCriteria;
                $criteria->limit = $limit;
                $criteria->offset = $offset;
                $criteria->order = 'id DESC';
                $sinceId = isset($_GET['sinceId']) && $_GET['sinceId'] != '' ? $_GET['sinceId'] : null;

                $criteria->addCondition( "post_status = 'approved'" );
                if( isset($sinceId) ){
                    $criteria->addCondition( " id > :sinceId " );
                    $criteria->params = array(':sinceId' => $sinceId);
                }

                //$criteria->condition = "post_status = :status";
                //$criteria->params = array(':status' => 'approved');
                $models = SocialPost::model()->findAll($criteria);

                if (empty($models)){
                    $this->_sendResponse(200, CJSON::encode(array()), $callback);
                }
                break;
            case 'shortlisted':
                $criteria = new CDbCriteria;
                $criteria->compare('status', 'active');
                $criteria->compare('is_shortlisted', '1');
                $criteria->limit = 50;
                $criteria->offset = 0;
                $criteria->order = 't.id DESC';
                $criteria->with = 'userProfiles';

                $model = Users::model()->findAll($criteria);
                $models = array();

                foreach ($model as $userDet) {
                    $user = new stdClass();
                    $user->id = $userDet->id;
                    $user->first_name =  $userDet->first_name;
                    $user->last_name =  $userDet->last_name;
                    $user->email =  $userDet->email;
                    $user->is_shortlisted =  $userDet->is_shortlisted;
                    $user->is_winner =  $userDet->is_winner;
                    $user->profileImage  =  $userDet->userProfiles->profile_image;

                    //$user->profileImage = '';


                    /*
                    foreach ($user->userProfiles as $usr) {
                        if (isset($usr->profile_image) && ($count < 11)) {
                            $shortListUser[$user->id] = $usr->profile_image;
                            $count++;
                            $models[] =$usr;
                        }
                    }*/
                    $models[] = $user   ;
                }

                if (empty($models)){
                    $this->_sendResponse(200, CJSON::encode(array()), $callback);
                }
                break;
            case 'winner':
                $criteria = new CDbCriteria;
                $criteria->compare('status', 'active');
                $criteria->compare('is_winner', '1');
                $criteria->limit = $limit;
                $criteria->offset = 0;
                $criteria->order = 't.id DESC';
                $criteria->with = 'userProfiles';

                $model = Users::model()->findAll($criteria);
                $models = array();

                foreach ($model as $userDet) {
                    $user = new stdClass();
                    $user->id = $userDet->id;
                    $user->fullname =  $userDet->userProfiles->full_name;
                    $user->email =  $userDet->email;
                    $user->is_shortlisted =  $userDet->is_shortlisted;
                    $user->is_winner =  $userDet->is_winner;
                    $user->profileImage  =  $userDet->userProfiles->profile_image;
                    $user->occupation   =  $userDet->userProfiles->occupation;
                    $user->about   =  $userDet->userProfiles->about_me;
                    $models[] = $user   ;
                }

                if (empty($models)){
                    $this->_sendResponse(200, CJSON::encode(array()), $callback);
                }
                break;
            default:
                // Model not implemented error
                $this->_sendResponse(501, sprintf( 'Error: Mode <b>list</b> is not implemented for model <b>%s</b>', $_GET['model'] ));
                Yii::app()->end();
        }
        // Did we get some results?
        if(empty($models)) {
            // No
            $this->_sendResponse(200, sprintf('No items where found for model <b>%s</b>', $_GET['model']) );
        } else {
            // Prepare response
            $rows = array();
            foreach($models as $model){
                if (isset($model->attributes)){
                    $rows[] = $model->attributes;
                } else {
                    $rows[] = $model;
                }
            }
            
            $this->_sendResponse(200, CJSON::encode($rows),$callback);
        }
    }

    public function actionView()
    {
        // Check if id was submitted via GET
        if(!isset($_GET['id']))
            $this->_sendResponse(500, 'Error: Parameter <b>id</b> is missing' );

        switch($_GET['model'])
        {
            // Find respective model
            case 'page':
                $pageDet = Page::model()->findByPk($_GET['id']);
                $galleries = array();
                $widgets = array();
                //get galleries

                foreach($pageDet->pageGalleries as $gallery){
                    $galleries[] = $gallery;
                }

                //get widgets
                foreach($pageDet->pageWidgets as $widget){
                   $widgets[] = $widget;
                }
                $model = array('page'=>$pageDet,'gallery'=>$galleries,'widget'=>$widgets);
                break;
            case 'social':
                $model = SocialPost::model()->findByPk($_GET['id']);
                break;
            case 'widget':
                $widgetDet = Widget::model()->findByPk($_GET['id']);
                if($widgetDet){
                    $typeId = $widgetDet->widget_type_id;

                    //get the widgetType details
                    $widgetType = WidgetType::model()->findByPk($typeId);
                    $model = array('label'=>$widgetType->name, 'data' => json_decode($widgetDet->data, true));
                }
                break;
            default:
                $this->_sendResponse(501, sprintf('Mode <b>view</b> is not implemented for model <b>%s</b>', $_GET['model']) );
                Yii::app()->end();
        }
        // Did we find the requested model? If not, raise an error
        if(is_null($model))
            $this->_sendResponse(404, 'No Item found with id '.$_GET['id']);
        else
            $this->_sendResponse(200, CJSON::encode($model));
    }

    public function actionCreate()
	{
        switch($_GET['model'])
        {
            case 'vote':
                $id = isset($_POST['content']) ? $_POST['content'] : null;
                if (!$id || !isset($_POST['email']) || empty($_POST['email'])){
                    //return failure
                    $this->_sendResponse(401, 'Error: Content Id is invalid.');
                }

                //check if not already voted for the same content
                $userVote = ContentVote::model()->find(
                                array(
                                    'condition'=>'content_id = :id AND username = :email',
                                    'params'=>array(':id'=>$id,':email'=>$_POST['email']),
                                    'limit' => 1,
                                )
                            );

                if (!$userVote){
                    $userVote = new ContentVote();
                    //save the user vote
                    $attributes = array(
                        'content_id' => $id,
                        'date' => date('Y-m-d h:i:s'),
                        'user_ip' => $_SERVER['REMOTE_ADDR'],
                        'auth_source' => 'site',
                        'social_id'   => $_POST['name'],
                        'username' => $_POST['email'],
                        'environment_id' => 1,
                    );
                    $userVote->attributes = $attributes;
                    if($userVote->save()){
                        //increment the vote count
                        $content = Content::model()->findByPk($id);
                        $newVoteCount = $content->vote += 1;
                        $content->save();

                        //return success and new vote count;
                        $this->_sendResponse(200,CJSON::encode(array('response'=>'success', 'message'=>'Voting Successful','vote'=>$newVoteCount)));
                        Yii::app()->end();
                    } else {
                        //return failure: cannot save vote information
                        $this->_sendResponse(200,CJSON::encode(array('response'=>'failure', 'message'=>"Cannot save vote information")));
                        Yii::app()->end();
                    }
                } else {
                    //return failure: already Voted
                    $this->_sendResponse(200,CJSON::encode(array('response'=>'failure', 'message'=>"Already Voted")));
                    Yii::app()->end();
                }
                break;
            case 'socialAuth':

                if(!isset($_POST['social']) || !isset($_POST['identifier'])){
                    $this->_sendResponse(501,sprintf('Email address is mandatory'));
                    Yii::app()->end();
                }

                //add data for user with unique email
                $auth = SocialAuth::model()->find(
                    array(
                        'condition'=>'identifier = :id || email = :email',
                        'params'=>array(':id'=>$_POST['identifier'],':email'=>$_POST['email']),
                        'limit' => 1,
                        'order' => 'date_added DESC',
                    ));
                if ($auth){
                    $this->_sendResponse(200,sprintf('Auth already exists for email %s', $_POST['email']));
                    Yii::app()->end();
                }
                $model = new SocialAuth();
                break;
            case 'socialPost':
                if(isset($_POST['post_text']) && isset($_POST['source'])){

                    $id = $_POST['user_id'];
                    $user=SocialAuth::model()->find(array(
                        'condition'=>'identifier=:id',
                        'params'=> array(':id'=>$id),
                        'limit'=>1,
                        'order'=>'date_added DESC',
                    ));

                    //if (!$user){
                    //    $this->_sendResponse(401, 'Error: Specified user does not exists');
                    //}

                    $model = new SocialPost();

                    $_POST['stream_id']         = -1;
                    $_POST['post_id']           = -1;
                    $_POST['post_lang']         = "en";
                    $_POST['user_lang']         = "en";
                    $_POST['date_published']    = date('c');
                    $_POST['date_published_ts'] = time();
                    $_POST['post_status']       = 'new';
                    $_POST['post_type']         = 'post';
                    $_POST['post_url']          = null;
                    $_POST['date_created']      = date("Y-m-d h:i:s");
                    $_POST['date_modified']     = $_POST['date_created'];
                    $_POST['post_hash']         = md5($_POST['date_published']."|".$_POST['post_url']);
                    $_POST['user_location']     = (isset($user)) ? $user->location : null;
                    $_POST['user_url']          = (isset($user)) ? $user->profile_url : null;
                    $_POST['post_status']       = 'new';

                } else {
                    $this->_sendResponse(401, 'Error: Invalid parameters.');
                }
                break;
            // Get an instance of the respective model
            case 'subscription':

                if(!isset($_POST['email'])){
                    $this->_sendResponse(501,sprintf('Email address is mandatory'));
                    Yii::app()->end();
                }
                $email = $_POST['email'];
                $user_ip = isset($_POST['user_id']) ? $_POST['user_ip'] : $_SERVER['REMOTE_ADDR'];
                $page_title = isset($_POST['page_title']) ? $_POST['page_title'] : 'curtain-raiser';

                //get the email address
                //check if any user already exists with the same email
                $criteria=new CDbCriteria;
                $criteria->condition = "email = :email AND page_title = :page_title";
                $criteria->params = array(
                                        ':email' => $email,
                                        ':page_title' => $page_title,
                                    );

                $subcriber = Subscription::model()->findAll($criteria);

                if (count($subcriber) > 0){
                    $this->_sendResponse(200,sprintf('Subscription for email %s already exists', $email));
                    Yii::app()->end();
                }

                //now save this model;
                $model = new Subscription();
                break;
            default:
                $this->_sendResponse(501,sprintf('Mode <b>create</b> is not implemented for model <b>%s</b>',$_GET['model']) );
                Yii::app()->end();
                break;
        }

        // Try to assign POST values to attributes
        foreach($_POST as $var=>$value) {

            if($model->hasAttribute($var)){
                $model->$var = $value;
            } else {
                $this->_sendResponse(500, sprintf('Parameter <b>%s</b> is not allowed for model <b>%s</b>', $var, $_GET['model']) );
            }
        }
        // Try to save the model
        if($model->save()){
            $message = $model;
            $this->_sendResponse(200, CJSON::encode($message));
        } else {
            // Errors occurred
            $msg = "<h1>Error</h1>";
            $msg .= sprintf("Couldn't create model <b>%s</b>", $_GET['model']);
            $msg .= "<ul>";
            foreach($model->errors as $attribute=>$attr_errors) {
                $msg .= "<li>Attribute: $attribute</li>";
                $msg .= "<ul>";
                foreach($attr_errors as $attr_error)
                    $msg .= "<li>$attr_error</li>";
                $msg .= "</ul>";
            }
            $msg .= "</ul>";
            $this->_sendResponse(500, $msg );
        }
	}

    public function actionUpdate()
    {
        $this->render('update');
    }

    public function actionDelete()
	{
		$this->render('delete');
	}

    private function _sendResponse($status = 200, $body = '', $callback = '', $content_type = 'application/json')
    {
        // set the status
        $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
        header($status_header);
        // and the content type
        //header('Content-type: ' . $content_type);
        header('Content-Type: ' . ($callback ? 'application/javascript' : 'application/json') . ';charset=UTF-8');

        // pages with body are easy
        if($body != '')
        {
            if ($callback){
                echo $callback."(".$body.")";
            } else {
                echo $body;
            }
        } else {
            // create some body messages
            $message = '';
            switch($status)
            {
                case 401:
                    $message = 'You must be authorized to view this page.';
                    break;
                case 404:
                    $message = 'The requested URL ' . $_SERVER['REQUEST_URI'] . ' was not found.';
                    break;
                case 500:
                    $message = 'The server encountered an error processing your request.';
                    break;
                case 501:
                    $message = 'The requested method is not implemented.';
                    break;
            }

            // servers don't always have a signature turned on
            // (this is an apache directive "ServerSignature On")
            $signature = ($_SERVER['SERVER_SIGNATURE'] == '') ? $_SERVER['SERVER_SOFTWARE'] . ' Server at ' . $_SERVER['SERVER_NAME'] . ' Port ' . $_SERVER['SERVER_PORT'] : $_SERVER['SERVER_SIGNATURE'];

            // this should be templated in a real-world solution
            $body = '
                    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
                    <html>
                    <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
                        <title>' . $status . ' ' . $this->_getStatusCodeMessage($status) . '</title>
                    </head>
                    <body>
                        <h1>' . $this->_getStatusCodeMessage($status) . '</h1>
                        <p>' . $message . '</p>
                        <hr />
                        <address>' . $signature . '</address>
                    </body>
                    </html>';
            echo $body;
        }
        Yii::app()->end();
    }

    private function _getStatusCodeMessage($status)
    {
        // these could be stored in a .ini file and loaded
        // via parse_ini_file()... however, this will suffice
        // for an example
        $codes = Array(
            200 => 'OK',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
        );
        return (isset($codes[$status])) ? $codes[$status] : '';
    }

    private function _checkAuth()
    {
        // Check if we have the USERNAME and PASSWORD HTTP headers set?
        if(!(isset($_SERVER['HTTP_X_USERNAME']) and isset($_SERVER['HTTP_X_PASSWORD']))) {
            // Error: Unauthorized
            $this->_sendResponse(401);
        }
        $username = $_SERVER['HTTP_X_USERNAME'];
        $password = $_SERVER['HTTP_X_PASSWORD'];
        // Find the user
        $user=User::model()->find('LOWER(username)=?',array(strtolower($username)));
        if($user===null) {
            // Error: Unauthorized
            $this->_sendResponse(401, 'Error: User Name is invalid');
        } else if(!$user->validatePassword($password)) {
            // Error: Unauthorized
            $this->_sendResponse(401, 'Error: User Password is invalid');
        }
    }


	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/

    /**
     * Function to authenticate a social user
     *
     */
    public function actionAuthenticate(){

        if(isset($_GET['social'])){
            $provider = $_GET['social'];

            if($provider=="googleplus" || $provider=="youtube"){
                $provider = "google";
            }

            $haComp = new HybridAuthIdentity();

            if (!$haComp->validateProviderName($provider))
                $this->_sendResponse(500, 'Error: This social account is not supported' );

            $haComp->adapter = $haComp->hybridAuth->authenticate($provider);
            $haComp->userProfile = $haComp->adapter->getUserProfile();

            // Save the user details
            $this->saveSocialData($haComp->userProfile,$provider,$haComp->adapter->getAccessToken());

        }
        //echo "<script> window.opener.updateUserInfo('".$provider."');*/ window.close();</script>";
        echo "<script> window.close();</script>";
    }

    public function actionTest(){

    }

    /**
     * Function to return the authenticated users details
     */
    public function actionGetSocialUser(){
        // Little hack


        if(isset($_GET['social'])){
            $provider = $_GET['social'];

            if($provider=="googleplus" || $provider=="youtube"){
                $provider = "google";
            }

            //TODO: Fix this : Unable to store session details, so we need to authenticate the user every time
            $haComp = new HybridAuthIdentity();

            if (!$haComp->validateProviderName($provider))
                $this->_sendResponse(500, 'Error: This social account is not supported' );

            $haComp->adapter = $haComp->hybridAuth->authenticate($provider);
            //$haComp->userProfile = $haComp->adapter->getUserProfile();
            $this->_sendResponse(200, CJSON::encode($haComp->adapter->getUserProfile()),$_GET['callback']);
        }

        $this->_sendResponse(404, 'Error: No social account found.');
    }


    /**
     *
     * Function to save social user data
     */
    private function saveSocialData($profileInfo,$social,$tokenInfo){
        $socialAuths = new SocialAuth();

        $authData['social'] = $social;
        $authData['identifier'] = $profileInfo->identifier;
        $authData['first_name'] = $profileInfo->firstName;
        $authData['last_name'] = $profileInfo->lastName;
        $authData['display_name'] = $profileInfo->firstName;
        $authData['email'] = $profileInfo->email;
        $authData['location'] = $profileInfo->region;
        $authData['access_token'] = $tokenInfo['access_token'];
        $authData['access_secret'] = $tokenInfo['access_token_secret'];
        $authData['token_expiry'] = $tokenInfo['expires_in'];

        $socialAuths->attributes = $authData;

        if ($socialAuths->save()){
            return true;
        }
        return false;
    }

}