<?php
/*!
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html 
*/

/**
 * Hybrid_Providers_Facebook provider adapter based on OAuth2 protocol
 * 
 * Hybrid_Providers_Facebook use the Facebook PHP SDK created by Facebook
 * 
 * http://hybridauth.sourceforge.net/userguide/IDProvider_info_Facebook.html
 */
class Hybrid_Providers_Facebook extends Hybrid_Provider_Model
{
	// default permissions, and alot of them. You can change them from the configuration by setting the scope to what you want/need
	public $scope = "email, user_about_me, user_birthday, user_hometown, user_website, read_stream, offline_access, publish_stream, read_friendlists, user_photos";

	/**
	* IDp wrappers initializer 
	*/
	function initialize() 
	{
		if ( ! $this->config["keys"]["id"] || ! $this->config["keys"]["secret"] ){
			throw new Exception( "Your application id and secret are required in order to connect to {$this->providerId}.", 4 );
		}

		if ( ! class_exists('FacebookApiException', false) ) {
			require_once Hybrid_Auth::$config["path_libraries"] . "Facebook/base_facebook.php";
			require_once Hybrid_Auth::$config["path_libraries"] . "Facebook/facebook.php";
		}
		
		if ( isset ( Hybrid_Auth::$config["proxy"] ) ) {
			BaseFacebook::$CURL_OPTS[CURLOPT_PROXY] = Hybrid_Auth::$config["proxy"];
		}

		$this->api = new Facebook( ARRAY( 'appId' => $this->config["keys"]["id"], 'secret' => $this->config["keys"]["secret"] ) ); 

		if ( $this->token("access_token") ) {
			$this->api->setAccessToken( $this->token("access_token") );
			$this->api->setExtendedAccessToken();
			$access_token = $this->api->getAccessToken();

			if( $access_token ){
				$this->token("access_token", $access_token );
				$this->api->setAccessToken( $access_token );
			}

			$this->api->setAccessToken( $this->token("access_token") );
		}

		$this->api->getUser();
	}


    /**
     * @throws Exception
     *
     * Get app access token
     */
    function getAppAccessToken()
    {
        if ( ! $this->config["keys"]["id"] || ! $this->config["keys"]["secret"] ){
            throw new Exception( "Your application id and secret are required in order to connect to {$this->providerId}.", 4 );
        }

        if ( ! class_exists('FacebookApiException', false) ) {
            require_once Hybrid_Auth::$config["path_libraries"] . "Facebook/base_facebook.php";
            require_once Hybrid_Auth::$config["path_libraries"] . "Facebook/facebook.php";
        }

        if ( isset ( Hybrid_Auth::$config["proxy"] ) ) {
            BaseFacebook::$CURL_OPTS[CURLOPT_PROXY] = Hybrid_Auth::$config["proxy"];
        }

        $this->api = new Facebook( ARRAY( 'appId' => $this->config["keys"]["id"], 'secret' => $this->config["keys"]["secret"] ) );

        $this->api->setAccessToken( null );
        $appToken = $this->api->getAccessToken();

        if( $appToken ){
            $this->token("access_token", $appToken );
            $this->api->setAccessToken( $appToken );
        }

        $this->api->setAccessToken( $this->token("access_token") );


        return $this->token("access_token");

    }

	/**
	* begin login step
	* 
	* simply call Facebook::require_login(). 
	*/
	function loginBegin()
	{
		$parameters = array("scope" => $this->scope, "redirect_uri" => $this->endpoint, "display" => "page");
		$optionals  = array("scope", "redirect_uri", "display");

		foreach ($optionals as $parameter){
			if( isset( $this->config[$parameter] ) && ! empty( $this->config[$parameter] ) ){
				$parameters[$parameter] = $this->config[$parameter];
			}
		}

		// get the login url
		$url = $this->api->getLoginUrl( $parameters );

		// redirect to facebook
		Hybrid_Auth::redirect( $url );
	}

	/**
	* finish login step 
	*/
	function loginFinish()
	{ 
		// in case we get error_reason=user_denied&error=access_denied
		if ( isset( $_REQUEST['error'] ) && $_REQUEST['error'] == "access_denied" ){ 
			throw new Exception( "Authentication failed! The user denied your request.", 5 );
		}

		// try to get the UID of the connected user from fb, should be > 0 
		if ( ! $this->api->getUser() ){
			throw new Exception( "Authentication failed! {$this->providerId} returned an invalid user id.", 5 );
		}

		// set user as logged in
		$this->setUserConnected();

		// store facebook access token 
		$this->token( "access_token", $this->api->getAccessToken() );
	}

	/**
	* logout
	*/
	function logout()
	{ 
		$this->api->destroySession();

		parent::logout();
	}

	/**
	* load the user profile from the IDp api client
	*/
	function getUserProfile()
	{
		// request user profile from fb api
		try{ 
			$data = $this->api->api('/me'); 
		}
		catch( FacebookApiException $e ){
			throw new Exception( "User profile request failed! {$this->providerId} returned an error: $e", 6 );
		} 

		// if the provider identifier is not recived, we assume the auth has failed
		if ( ! isset( $data["id"] ) ){ 
			throw new Exception( "User profile request failed! {$this->providerId} api returned an invalid response.", 6 );
		}

		# store the user profile.
		$this->user->profile->identifier    = (array_key_exists('id',$data))?$data['id']:"";
		$this->user->profile->displayName   = (array_key_exists('name',$data))?$data['name']:"";
		$this->user->profile->firstName     = (array_key_exists('first_name',$data))?$data['first_name']:"";
		$this->user->profile->lastName      = (array_key_exists('last_name',$data))?$data['last_name']:"";
		$this->user->profile->photoURL      = "https://graph.facebook.com/" . $this->user->profile->identifier . "/picture?width=150&height=150";
		$this->user->profile->profileURL    = (array_key_exists('link',$data))?$data['link']:""; 
		$this->user->profile->webSiteURL    = (array_key_exists('website',$data))?$data['website']:""; 
		$this->user->profile->gender        = (array_key_exists('gender',$data))?$data['gender']:"";
		$this->user->profile->description   = (array_key_exists('bio',$data))?$data['bio']:"";
		$this->user->profile->email         = (array_key_exists('email',$data))?$data['email']:"";
		$this->user->profile->emailVerified = (array_key_exists('email',$data))?$data['email']:"";
		$this->user->profile->region        = (array_key_exists("hometown",$data)&&array_key_exists("name",$data['hometown']))?$data['hometown']["name"]:"";

		if( array_key_exists('birthday',$data) ) {
			list($birthday_month, $birthday_day, $birthday_year) = explode( "/", $data['birthday'] );

			$this->user->profile->birthDay   = (int) $birthday_day;
			$this->user->profile->birthMonth = (int) $birthday_month;
			$this->user->profile->birthYear  = (int) $birthday_year;
		}

		return $this->user->profile;
 	}

	/**
	* load the user contacts
	*/
	function getUserContacts()
	{
		try{ 
			$response = $this->api->api('/me/friends'); 
		}
		catch( FacebookApiException $e ){
			throw new Exception( "User contacts request failed! {$this->providerId} returned an error: $e" );
		} 
 
		if( ! $response || ! count( $response["data"] ) ){
			return ARRAY();
		}

		$contacts = ARRAY();
 
		foreach( $response["data"] as $item ){
			$uc = new Hybrid_User_Contact();

			$uc->identifier  = (array_key_exists("id",$item))?$item["id"]:"";
			$uc->displayName = (array_key_exists("name",$item))?$item["name"]:"";
			$uc->profileURL  = "https://www.facebook.com/profile.php?id=" . $uc->identifier;
			$uc->photoURL    = "https://graph.facebook.com/" . $uc->identifier . "/picture?width=150&height=150";

			$contacts[] = $uc;
		}

		return $contacts;
 	}

	/**
	* update user status
	*/
	function setUserStatus( $status )
	{
		$parameters = array();

		if( is_array( $status ) ){
			$parameters = $status;
		}
		else{
			$parameters["message"] = $status; 
		}

		try{ 
			$response = $this->api->api( "/me/feed", "post", $parameters );
		}
		catch( FacebookApiException $e ){
			throw new Exception( "Update user status failed! {$this->providerId} returned an error: $e" );
		}
 	}

	/**
	* load the user latest activity  
	*    - timeline : all the stream
	*    - me       : the user activity only  
	*/
	function getUserActivity( $stream )
	{
		try{
			if( $stream == "me" ){
				$response = $this->api->api( '/me/feed' ); 
			}
			else{
				$response = $this->api->api('/me/home'); 
			}
		}
		catch( FacebookApiException $e ){
			throw new Exception( "User activity stream request failed! {$this->providerId} returned an error: $e" );
		}

		if( ! $response || ! count(  $response['data'] ) ){
			return ARRAY();
		}

		$activities = ARRAY();

		foreach( $response['data'] as $item ){
			if( $stream == "me" && $item["from"]["id"] != $this->api->getUser() ){
				continue;
			}

			$ua = new Hybrid_User_Activity();

			$ua->id                 = (array_key_exists("id",$item))?$item["id"]:"";
			$ua->date               = (array_key_exists("created_time",$item))?strtotime($item["created_time"]):"";

			if( $item["type"] == "video" ){
				$ua->text           = (array_key_exists("link",$item))?$item["link"]:"";
			}

			if( $item["type"] == "link" ){
				$ua->text           = (array_key_exists("link",$item))?$item["link"]:"";
			}

			if( empty( $ua->text ) && isset( $item["story"] ) ){
				$ua->text           = (array_key_exists("link",$item))?$item["link"]:"";
			}

			if( empty( $ua->text ) && isset( $item["message"] ) ){
				$ua->text           = (array_key_exists("message",$item))?$item["message"]:"";
			}

			if( ! empty( $ua->text ) ){
				$ua->user->identifier   = (array_key_exists("id",$item["from"]))?$item["from"]["id"]:"";
				$ua->user->displayName  = (array_key_exists("name",$item["from"]))?$item["from"]["name"]:"";
				$ua->user->profileURL   = "https://www.facebook.com/profile.php?id=" . $ua->user->identifier;
				$ua->user->photoURL     = "https://graph.facebook.com/" . $ua->user->identifier . "/picture?type=square";

				$activities[] = $ua;
			}
		}

		return $activities;
 	}

    /**
     * Get user photos
     *  - me/photos
     */
    function getPhotos($direction=null){
        try{
            $url = '/me/photos?type=uploaded&limit=25';
            if(!is_null($direction) && !empty($_SESSION['paging'])) {
                if($direction=="next")
                    $url.= "&after=".$_SESSION['paging']['cursors']['after'];
                else if($direction=="prev")
                    $url.= "&before=".$_SESSION['paging']['cursors']['before'];
            }
//            print_r($_SESSION['paging']); exit;
            //$response = $this->api->api('/me/?fields=photos.type(uploaded)');
            $response = $this->api->api($url);
        }
        catch( FacebookApiException $e ){
            throw new Exception( "User photos request failed! {$this->providerId} returned an error: $e" );
        }

//        print_r($response);

        if( ! $response || ! count(  $response['data'] ) ){
            return ARRAY();
        }

        $activities = ARRAY();

        foreach( $response['data'] as $key=>$item ){
            if($item["from"]["id"] != $this->api->getUser() ){
                continue;
            }
            $activities[$key]['image'] = $item['picture'];
            $activities[$key]['original_image'] = $item['images'][0];
        }
        $_SESSION['paging'] = $response['paging'];

        unset($response); // Release the memory

        return $activities;

    }

    /**
     * Function to get social post by  search string
     */
    function getSocialPosts($params){
        try {
            $response  = $this->api->api( '/search', $params );
//            print_r($response);

        } catch(FacebookApiException $e){
            throw new Exception( "Social post request failed! {$this->providerId} returned an error. " . $this->errorMessageByStatus( $this->api->http_code ) );
        }

        if( ! $response ){
            return ARRAY();
        }

        $activities = ARRAY();

        foreach( $response['data'] as $item ){
            $sa                         = new Hybrid_Social_Post();

            $fbId                       = (isset($item['id']))?$item['id']:"";
            $ids                        = explode("_",$fbId);

            $sa->id                     = $ids[1];
            $sa->date                   = (isset($item['created_time']))?$item['created_time']:"";
            $sa->timestamp              = (isset($item['created_time']))?strtotime($item['created_time']):time();
            $sa->text                   = (isset($item['message']))?$item['message']:"";
            $sa->lang                   = "en";
            $sa->source                 = "facebook";       // (isset($item['source']))?$item['source']:"";
            $sa->type                   = (isset($item['type']))?$item['type']:"";
            $sa->postStoryText          = (isset($item['story']))?$item['story']:"";
            $sa->postPicture            = (isset($item['picture']))?$item['picture']:"";
            $sa->postLink               = (isset($item['link']))?$item['link']:"";
            $sa->postName               = (isset($item['name']))?$item['name']:"";
            $sa->postCaption            = (isset($item['caption']))?$item['caption']:"";
            $sa->postDescription        = (isset($item['description']))?$item['description']:"";
            $sa->postLikes              = (isset($item['likes']))?count($item['likes']['data']):"";    // Since there is no explicit post like count, take the like data count,
            $sa->postComments           = "";

            $name                       = (isset($item['from']['name']))?$item['from']['name']:"";
            $fullName                   = explode(" ",$name);

            $sa->user->profile->identifier       = (isset($item['from']['id']))?$item['from']['id']:"";
            $sa->user->profile->firstName        = isset($fullName[0])?$fullName[0]:"";
            $sa->user->profile->lastName         = isset($fullName[1])?$fullName[1]:"";
            $sa->user->profile->displayName      = $name;
            $sa->user->profile->profileURL       = "https://www.facebook.com/".$sa->user->profile->identifier;
            $sa->user->profile->photoURL         = "https://graph.facebook.com/".$sa->user->profile->identifier."/picture";

            $sa->postUrl                = "https://www.facebook.com/".$sa->user->profile->identifier."/posts/".$sa->id;

            $activities[]               = $sa;
        }

        return $activities;
    }
}
