<?php
/*!
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html 
*/

/**
 * Hybrid_Social_Posts
 * 
 * used to provider social stream by a search query on a standardized structure across supported social apis.
 *
 */
class Hybrid_Social_Post
{
	/* activity id on the provider side, usually given as integer */
	public $id = NULL;

	/* activity content as a string */
	public $text = NULL;

    /* activity content language*/
    public $lang = NULL;

    /* activity content source */
    public $source = NULL;

    /* activity content url */
    public $postUrl = NULL;

    /* activity content type (Tweet/retweet/share/reply/photo/link/video etc) */
    public $type = NULL;

    /* activity story type (facebook) */
    public $postStoryText = NULL;

    /* activity post picture (facebook: if type link/photo/video, the default pic) */
    public $postPicture = NULL;

    /* activity post link (facebook: if type link/photo/video, the href link) */
    public $postLink = NULL;

    /* activity post name (facebook: if type link/photo/video, the name of the link) */
    public $postName = NULL;

    /* activity post caption (facebook: if type link/photo/video, the caption of the link) */
    public $postCaption = NULL;

    /* activity post description (facebook: if type link/photo/video, the description of the link) */
    public $postDescription = NULL;

    /* activity post category // Need to verify from zain */
    public $postCategory = NULL;

    /* activity story likes (count) */
    public $postLikes = NULL;

    /* activity story comment (count) */
    public $postComments = NULL;

    /* activity date of creation */
	public $date = NULL;

	/* activity timestamp of creation */
	public $timestamp = NULL;

	/* user who created the activity */
	public $user = NULL;


	public function __construct()
    {

        /**
         * typically, we should have a few information about the user who created the event from social apis,
         * extra datas will be added by the provider
         */
        $this->user = new Hybrid_User();

        /*
        $this->user = new stdClass();
        $this->user->identifier  = NULL;
        $this->user->name        = NULL;
        $this->user->displayName = NULL;
        $this->user->profileURL  = NULL;
        $this->user->photoURL    = NULL;
        $this->user->lang        = NULL;
        $this->user->location    = NULL;
        */
    }
}