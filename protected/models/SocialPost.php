<?php

/**
 * This is the model class for table "social_posts".
 *
 * The followings are the available columns in table 'social_posts':
 * @property integer $id
 * @property integer $stream_id
 * @property string $source
 * @property string $post_id
 * @property string $post_hash
 * @property string $post_text
 * @property string $post_lang
 * @property string $post_source
 * @property string $post_url
 * @property string $post_type
 * @property string $post_story_text
 * @property string $post_picture
 * @property string $post_link
 * @property string $post_name
 * @property string $post_caption
 * @property string $post_description
 * @property string $user_category
 * @property string $user_profile_image
 * @property string $user_name
 * @property string $user_screen_name
 * @property string $user_id
 * @property string $user_lang
 * @property string $user_location
 * @property integer $user_followers_count
 * @property integer $user_friend_count
 * @property integer $user_status_count
 * @property integer $post_likes
 * @property integer $post_comments
 * @property string $user_url
 * @property string $post_status
 * @property string $date_published
 * @property string $date_published_ts
 * @property string $date_added
 * @property string $date_modified
 *
 * The followings are the available model relations:
 * @property SocialStreams $stream
 */
class SocialPost extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'social_posts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('stream_id, source, post_id, post_hash, post_text, date_published, date_published_ts, date_modified', 'required'),
			array('stream_id, user_followers_count, user_friend_count, user_status_count, post_likes, post_comments', 'numerical', 'integerOnly'=>true),
			array('source', 'length', 'max'=>10),
			array('post_id, post_hash', 'length', 'max'=>64),
			array('post_lang, user_lang', 'length', 'max'=>25),
			array('post_type, user_category', 'length', 'max'=>250),
			array('user_name', 'length', 'max'=>150),
			array('user_screen_name', 'length', 'max'=>50),
			array('user_id', 'length', 'max'=>32),
			array('post_status', 'length', 'max'=>8),
			array('date_published', 'length', 'max'=>35),
			array('date_published_ts', 'length', 'max'=>20),
			array('post_source, post_url, post_story_text, post_picture, post_link, post_name, post_caption, post_description, user_profile_image, user_location, user_url, date_added', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, stream_id, source, post_id, post_hash, post_text, post_lang, post_source, post_url, post_type, post_story_text, post_picture, post_link, post_name, post_caption, post_description, user_category, user_profile_image, user_name, user_screen_name, user_id, user_lang, user_location, user_followers_count, user_friend_count, user_status_count, post_likes, post_comments, user_url, post_status, date_published, date_published_ts, date_added, date_modified', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'stream' => array(self::BELONGS_TO, 'SocialStream', 'stream_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'stream_id' => 'Stream',
			'source' => 'Source',
			'post_id' => 'Post',
			'post_hash' => 'Post Hash',
			'post_text' => 'Post Text',
			'post_lang' => 'Post Lang',
			'post_source' => 'Post Source',
			'post_url' => 'Post Url',
			'post_type' => 'Post Type',
			'post_story_text' => 'Post Story Text',
			'post_picture' => 'Post Picture',
			'post_link' => 'Post Link',
			'post_name' => 'Post Name',
			'post_caption' => 'Post Caption',
			'post_description' => 'Post Description',
			'user_category' => 'User Category',
			'user_profile_image' => 'User Profile Image',
			'user_name' => 'User Name',
			'user_screen_name' => 'User Screen Name',
			'user_id' => 'User',
			'user_lang' => 'User Lang',
			'user_location' => 'User Location',
			'user_followers_count' => 'User Followers Count',
			'user_friend_count' => 'User Friend Count',
			'user_status_count' => 'User Status Count',
			'post_likes' => 'Post Likes',
			'post_comments' => 'Post Comments',
			'user_url' => 'User Url',
			'post_status' => 'Post Status',
			'date_published' => 'Date Published',
			'date_published_ts' => 'Date Published Ts',
			'date_added' => 'Date Added',
			'date_modified' => 'Date Modified',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('stream_id',$this->stream_id);
		$criteria->compare('source',$this->source,true);
		$criteria->compare('post_id',$this->post_id,true);
		$criteria->compare('post_hash',$this->post_hash,true);
		$criteria->compare('post_text',$this->post_text,true);
		$criteria->compare('post_lang',$this->post_lang,true);
		$criteria->compare('post_source',$this->post_source,true);
		$criteria->compare('post_url',$this->post_url,true);
		$criteria->compare('post_type',$this->post_type,true);
		$criteria->compare('post_story_text',$this->post_story_text,true);
		$criteria->compare('post_picture',$this->post_picture,true);
		$criteria->compare('post_link',$this->post_link,true);
		$criteria->compare('post_name',$this->post_name,true);
		$criteria->compare('post_caption',$this->post_caption,true);
		$criteria->compare('post_description',$this->post_description,true);
		$criteria->compare('user_category',$this->user_category,true);
		$criteria->compare('user_profile_image',$this->user_profile_image,true);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('user_screen_name',$this->user_screen_name,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('user_lang',$this->user_lang,true);
		$criteria->compare('user_location',$this->user_location,true);
		$criteria->compare('user_followers_count',$this->user_followers_count);
		$criteria->compare('user_friend_count',$this->user_friend_count);
		$criteria->compare('user_status_count',$this->user_status_count);
		$criteria->compare('post_likes',$this->post_likes);
		$criteria->compare('post_comments',$this->post_comments);
		$criteria->compare('user_url',$this->user_url,true);
		$criteria->compare('post_status',$this->post_status,true);
		$criteria->compare('date_published',$this->date_published,true);
		$criteria->compare('date_published_ts',$this->date_published_ts,true);
		$criteria->compare('date_added',$this->date_added,true);
		$criteria->compare('date_modified',$this->date_modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SocialPost the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
