<?php
/*!
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html 
*/

/**
 * Hybrid_Providers_Google provider adapter based on OAuth2 protocol
 * 
 * http://hybridauth.sourceforge.net/userguide/IDProvider_info_Google.html
 */
class Hybrid_Providers_Google extends Hybrid_Provider_Model_OAuth2
{
	// default permissions
    // Watch out this space from https://developers.google.com/+/api/oauth#revoking
	public $scope = "https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read https://www.googleapis.com/auth/userinfo.profile https://www.google.com/m8/feeds/";

	/**
	* IDp wrappers initializer 
	*/
	function initialize() 
	{
		parent::initialize();

		// Provider api end-points
		$this->api->authorize_url  = "https://accounts.google.com/o/oauth2/auth";
		$this->api->token_url      = "https://accounts.google.com/o/oauth2/token";
		$this->api->token_info_url = "https://www.googleapis.com/oauth2/v1/tokeninfo";
	}

	/**
	* begin login step 
	*/
	function loginBegin()
	{
		$parameters = array("scope" => $this->scope, "access_type" => "offline");
		$optionals  = array("scope", "access_type", "redirect_uri", "approval_prompt", "hd");

		foreach ($optionals as $parameter){
			if( isset( $this->config[$parameter] ) && ! empty( $this->config[$parameter] ) ){
				$parameters[$parameter] = $this->config[$parameter];
			}
		}

		Hybrid_Auth::redirect( $this->api->authorizeUrl( $parameters ) ); 
	}

	/**
	* load the user profile from the IDp api client
	*/
	function getUserProfile()
	{
		// refresh tokens if needed 
		$this->refreshToken();

		// ask google api for user infos
		$response = $this->api->api( "https://www.googleapis.com/oauth2/v1/userinfo" );      https://www.googleapis.com/auth/plus.login

		if ( ! isset( $response->id ) || isset( $response->error ) ){
			throw new Exception( "User profile request failed! {$this->providerId} returned an invalid response.", 6 );
		}

		$this->user->profile->identifier    = (property_exists($response,'id'))?$response->id:"";
		$this->user->profile->firstName     = (property_exists($response,'given_name'))?$response->given_name:"";
		$this->user->profile->lastName      = (property_exists($response,'family_name'))?$response->family_name:"";
		$this->user->profile->displayName   = (property_exists($response,'name'))?$response->name:"";
		$this->user->profile->photoURL      = (property_exists($response,'picture'))?$response->picture:"";
		$this->user->profile->profileURL    = "https://profiles.google.com/" . $this->user->profile->identifier;
		$this->user->profile->gender        = (property_exists($response,'gender'))?$response->gender:""; 
		$this->user->profile->email         = (property_exists($response,'email'))?$response->email:"";
		$this->user->profile->emailVerified = (property_exists($response,'email'))?$response->email:"";
		$this->user->profile->language      = (property_exists($response,'locale'))?$response->locale:"";

		if( property_exists($response,'birthday') ){ 
			list($birthday_year, $birthday_month, $birthday_day) = explode( '-', $response->birthday );

			$this->user->profile->birthDay   = (int) $birthday_day;
			$this->user->profile->birthMonth = (int) $birthday_month;
			$this->user->profile->birthYear  = (int) $birthday_year;
		}

		return $this->user->profile;
	}

	/**
	* load the user (Gmail) contacts 
	*  ..toComplete
	*/
	function getUserContacts()
	{ 
		// refresh tokens if needed 
		$this->refreshToken();  

		if( ! isset( $this->config['contacts_param'] ) ){
			$this->config['contacts_param'] = array( "max-results" => 500 );
		}

		$response = $this->api->api( "https://www.google.com/m8/feeds/contacts/default/full?" 
							. http_build_query( array_merge( array('alt' => 'json'), $this->config['contacts_param'] ) ) ); 

		if( ! $response ){
			return ARRAY();
		}
 
		$contacts = ARRAY(); 

		foreach( $response->feed->entry as $idx => $entry ){
			$uc = new Hybrid_User_Contact();

			$uc->email        = isset($entry->{'gd$email'}[0]->address) ? (string) $entry->{'gd$email'}[0]->address : ''; 
			$uc->displayName  = isset($entry->title->{'$t'}) ? (string) $entry->title->{'$t'} : '';  
			$uc->identifier   = $uc->email;

			$contacts[] = $uc;
		}  

		return $contacts;
 	}

    function getAppAccessToken(){
        return true;
    }



    /**
     * Function to get social post by  search string
     */
    function getSocialPosts($params){
        try {
            $params['key'] = $this->config['keys']['id'];
            //$params['secret'] = $this->config['keys']['secret'];

            $response  = $this->api->api( 'https://www.googleapis.com/oauth2/v1/activities','GET', $params );
            print_r($this->api);
            print_r($response);
            exit;

        } catch(Exception $e){
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

            $sa->postUrl                = "https://www.facebook.com/posts/".$sa->id;

            $activities[]               = $sa;
        }

        return $activities;
    }
}
